// see http://vuejs-templates.github.io/webpack for documentation.
var path = require('path')
//作为开发环境以及生产环境打包切换的配置文件
module.exports = {
  build: {
    env: require('./prod.env'),//环境类型
    index: path.resolve(__dirname, '../dist/index.html'),//入口html文件；将源路径__dirname（当前模块目录这里指/frontEnd/config/）解析到目标路径，这里输出/frontEnd/dist/index.html
    assetsRoot: path.resolve(__dirname, '../dist'),//打包资源输出路径；将源路径__dirname（当前模块目录这里指/frontEnd/config/）解析到目标路径，这里输出/frontEnd/dist/
    assetsSubDirectory: 'static',//打包资源输出子路径；
    assetsPublicPath: '/',//代码部署访问路径
    productionSourceMap: true,
    // Gzip off by default as many popular static hosts such as
    // Surge or Netlify already gzip all static assets for you.
    // Before setting to `true`, make sure to:
    // npm install --save-dev compression-webpack-plugin
    productionGzip: false,//生产压缩
    productionGzipExtensions: ['js', 'css']//生产压缩文件类型
  },
  dev: {
    env: require('./dev.env'),//环境类型
    port: 8081,//端口号
    assetsSubDirectory: 'static',//打包资源输出子路径；
    assetsPublicPath: '/',//代码部署访问路径
    proxyTable: {},//代理列表
    // CSS Sourcemaps off by default because relative paths are "buggy"
    // with this option, according to the CSS-Loader README
    // (https://github.com/webpack/css-loader#sourcemaps)
    // In our experience, they generally work as expected,
    // just be aware of this issue when enabling this option.
    cssSourceMap: false
  }
}
