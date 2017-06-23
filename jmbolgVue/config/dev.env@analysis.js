//webpack 的一个插件，用于合并多个webpack 配置文件
var merge = require('webpack-merge')

var prodEnv = require('./prod.env')

module.exports = merge(prodEnv, {
  NODE_ENV: '"development"'
})
