// https://github.com/shelljs/shelljs
require('./check-versions')()
// ShellJS是Node.js API之上的Unix shell命令的便携式（Windows / Linux / OS X）实现，可以用此插件的api使用控制台的命令完成对操作系统的操作
require('shelljs/global')
env.NODE_ENV = 'production'

var path = require('path')
var config = require('../config')
//https://cnpmjs.org/package/ora
var ora = require('ora')
var webpack = require('webpack')
var webpackConfig = require('./webpack.prod.conf')

console.log(
  '  Tip:\n' +
  '  Built files are meant to be served over an HTTP server.\n' +
  '  Opening index.html over file:// won\'t work.\n'
)

var spinner = ora('building for production...')//优雅的终端样式微调插件，类似chalk,但是chalk负责颜色，ora负责图标等效果
spinner.start()//开始的效果，启动一个旋转器

//利用unix shell命令，新建输出目录
var assetsPath = path.join(config.build.assetsRoot, config.build.assetsSubDirectory)
rm('-rf', assetsPath)//删除多级
mkdir('-p', assetsPath)//创建多级目录
cp('-R', 'static/*', assetsPath)//复制整个文件夹内容
//执行webpack打包任务
webpack(webpackConfig, function (err, stats) {//https://webpack.js.org/api/node/#webpack-
  spinner.stop()
  if (err) throw err  //错误检测
  process.stdout.write(stats.toString({//输出打包过程状态信息
    colors: true,
    modules: false,
    children: false,
    chunks: false,
    chunkModules: false
  }) + '\n')
})
