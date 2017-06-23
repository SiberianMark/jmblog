//启动服务器之前先执行验证版本号是否满足
require('./check-versions')()

//加载整个项目相关配置，1.项目架构设计一般会设计一个config目录或者文件来配置相关的项目信息
var config = require('../config')

// 2.读入配置并设置项目以及其运行环境的配置参数
//设置当前node进程环境为开发环境http://nodejs.cn/api/process.html#process_process_env
if (!process.env.NODE_ENV) process.env.NODE_ENV = config.dev.env
//引入nodejs path 模块 用于路径相关操作 如resolve等等http://nodejs.cn/api/path.html
var path = require('path')
//引入nodejs express 框架便于创建各种nodejs web 应用
var express = require('express')
//引入webpack插件进行webpack配置
var webpack = require('webpack')
//引入打开文件的插件，异步返回promise对象 https://cnpmjs.org/package/opn
var opn = require('opn')
//引入http代理插件，用于请求代理相关操作
var proxyMiddleware = require('http-proxy-middleware')

//引入webpack配置文件3. webpack 工具一般会单独出一个webpack的配置文件目录或者配置文件，用于设置webpack基础配置，开发配置以及线上配置
var webpackConfig = require('./webpack.dev.conf')
//设置默认端口号
// default port where dev server listens for incoming traffic
var port = process.env.PORT || config.dev.port
// Define HTTP proxies to your custom API backend；定义代理地址
// https://github.com/chimurai/http-proxy-middleware
var proxyTable = config.dev.proxyTable

//创建一个express应用
var app = express()

//执行webpack配置
var compiler = webpack(webpackConfig)

// webpack的一个简单的包装中间件。 它通过连接服务器将Webpack发出的文件发送给服务器。 这只能用于开发。
var devMiddleware = require('webpack-dev-middleware')(compiler, {
  publicPath: webpackConfig.output.publicPath,//输出路径
  stats: {//webpack打包状态信息
    colors: true,
    chunks: false
  }
})
// webpack的一个简单的包装中间件，配合webpack-dev-middleware存于内存，实现热重载http://www.tuicool.com/articles/22aQ7vu
var hotMiddleware = require('webpack-hot-middleware')(compiler)
// force page reload when html-webpack-plugin template changes
// compiler.plugin为webpack一种加载插件的api,可以强制加载插件进行操作，这里实现加载html-webpack-plugin-after-emit,监控模板变化自动重载
compiler.plugin('compilation', function (compilation) {//监控热加载刷新
  compilation.plugin('html-webpack-plugin-after-emit', function (data, cb) {
    hotMiddleware.publish({ action: 'reload' })
    cb()
  })
})

// proxy api requests
Object.keys(proxyTable).forEach(function (context) {
  var options = proxyTable[context]
  if (typeof options === 'string') {
    options = { target: options }
  }
  app.use(proxyMiddleware(context, options))
})

// handle fallback for HTML5 history API；让你的单页面路由处理更自然，将跳转转化为内部索引跳转；https://cnpmjs.org/package/connect-history-api-fallback
app.use(require('connect-history-api-fallback')())

// serve webpack bundle output 注入热重载到app应用
app.use(devMiddleware)

// enable hot-reload and state-preserving
// compilation error display 注入热重载到app应用
app.use(hotMiddleware)

// serve pure static assets
var staticPath = path.posix.join(config.dev.assetsPublicPath, config.dev.assetsSubDirectory)
app.use(staticPath, express.static('./static'))//注入输出路径static到app应用
//
//启动http应用服务器监听设置端口
module.exports = app.listen(port, function (err) {
  if (err) {
    console.log(err)
    return
  }
  var uri = 'http://localhost:' + port
  console.log('Listening at ' + uri + '\n')
  opn(uri)
})
