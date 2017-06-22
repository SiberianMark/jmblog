// npm使用的语义版本解析器,用于版本号操作计算的方法库https://cnpmjs.org/package/semver
var semver = require('semver')
// 终端字符串样式构造器，支持多种颜色https://cnpmjs.org/package/chalk
var chalk = require('chalk')
// packageConfig获取项目包配置文件
var packageConfig = require('../package.json')
// child_process这个模块非常重要，赋予了开发者控制子进程操作逻辑的能力https://segmentfault.com/a/1190000007735211
var exec = function (cmd) {//包裹执行命令行的函数
  return require('child_process')
    .execSync(cmd).toString().trim()
}

var versionRequirements = [
  {
    name: 'node',
    currentVersion: semver.clean(process.version),//semver.clean('  =v1.2.3   ') // '1.2.3'
    versionRequirement: packageConfig.engines.node//获取node版本号
  },
  {
    name: 'npm',
    currentVersion: exec('npm --version'),//执行获取npm版本号
    versionRequirement: packageConfig.engines.npm
  }
]

module.exports = function () {//到处一个执行函数
  var warnings = []
  for (var i = 0; i < versionRequirements.length; i++) {
    var mod = versionRequirements[i]
    if (!semver.satisfies(mod.currentVersion, mod.versionRequirement)) {//验证版本号是否满足条件；semver.satisfies('1.2.3', '1.x || >=2.5.0 || 5.0.0 - 7.2.3') // true
     //警告的数组
      warnings.push(mod.name + ': ' +
        chalk.red(mod.currentVersion) + ' should be ' +
        chalk.green(mod.versionRequirement)
      )
    }
  }

  if (warnings.length) {
    console.log('')
    console.log(chalk.yellow('To use this template, you must update following to modules:'))//输出到控制台警告标语，为黄色
    console.log()
    for (var i = 0; i < warnings.length; i++) {
      var warning = warnings[i]
      console.log('  ' + warning)//依次输出警告到控制台
    }
    console.log()
    // Node.js的process模块，用来与当前进程互动，可以通过全局变量process访问，不必使用require命令加载。它是一个EventEmitter对象的实例
    // http://www.css88.com/archives/4548
    process.exit(1)
  }
}
