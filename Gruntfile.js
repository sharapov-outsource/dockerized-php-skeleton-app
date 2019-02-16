'use strict';
module.exports = function (grunt) {
  var pkg = grunt.file.readJSON('package.json');
  grunt.initConfig({
    pkg: pkg,
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: {
          'public/assets/css/app.min.css': 'public/assets/css/scss/app.scss'
        }
      }
    },
    uglify: {
      options: {
        sourceMap: true
      },
      dist: {
        files: {
          'public/assets/js/app.min.js': ['public/assets/js/src/app.js'],
        }
      }
    }
  });
  require('load-grunt-tasks')(grunt);
  grunt.registerTask('build', ['sass', 'uglify']);
  grunt.registerTask('default', ['build']);
};
