nodeRequire('electron')
  .remote
  .getCurrentWindow()
  // 设置半透明效果  https://electronjs.org/docs/api/browser-window#winsetvibrancytype-macos 
  .BrowserWindow({ width: 800, height: 600, frame: false, transparent: true})
  .setVibrancy('ultra-dark');

// const { BrowserWindow } = require('electron')
// const win = new BrowserWindow({ width: 800, height: 600, frame: false, transparent: true})
// win.show()