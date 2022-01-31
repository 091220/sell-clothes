var aglio = require('aglio');
var fs = require('fs');
var options = {
  themeVariables: 'streak',
  themeTemplate: "triple",
  themeFullWidth: true,

};
var version = '3.0';
var outputFolder = `main/dist/${version}`;
if (!fs.existsSync(outputFolder)) {
	fs.mkdirSync(outputFolder);
}
aglio.renderFile('main/src/docs/input.apib', `main/dist/${version}/output.html`, options, function (err, warnings) {
    if (err) return console.log(err);
    //if (warnings) console.log(warnings);
});
