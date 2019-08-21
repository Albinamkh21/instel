'use strict';
var fs = require('fs');

module.exports = function() {
  //  let locals = require('../../content.json');
    let locals =[];
  $.gulp.task('pug', function() {
    return $.gulp.src('./resources/views/defaults/*.pug')
      .pipe($.gp.pug({
          locals : locals, //JSON.parse(fs.readFileSync('./content.json', 'utf8')),
          pretty: true
      }))
      .on('error', $.gp.notify.onError(function(error) {
        return {
          title: 'Pug',
          message:  error.message
        }
       }))
      .pipe($.gulp.dest($.config.root));
  });
};
