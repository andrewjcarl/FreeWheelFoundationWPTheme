module.exports = function(grunt) {
  var banner = [
    '/*!',
    ' * <%= pkg.name %> v<%= pkg.version %>',
    ' * Build date: <%= grunt.template.today("yyyy-mm-dd") %>',
    ' * Copyright 2014.',
    ' */'
  ].join('\n');

  // outputs lovely informative build-time chart
  console.log('grunting on time');

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      sass: {
        files: ['<%= pkg.directories.scss %>/**/*.scss'],
        tasks: ['compile'],
        options: {
          livereload: true,
        }
      },
      js: {
        files: ['<%= pkg.directories.js %>/**/*.js'],
        tasks: ['compile']
      }
    },
    sass: {
      options: {
        banner: banner
      },
      dev: {
        options: {
          style: 'expanded',
          trace: true
        },
        files: {
          '<%= pkg.directories.css %>/main.css': '<%= pkg.directories.scss %>/style.scss'
        }
      }
    },
    concat: {
      options: {
        separator: '\n\n',
        banner: banner
      },
      vendor: {
        src: [
          '<%= pkg.directories.js %>/vendor/*.js',
        ],
        dest: '<%= pkg.directories.js %>/vendor.js'
      },
      app: {
        src: [
          '<%= pkg.directories.js %>/app/*.js',
        ],
        dest: '<%= pkg.directories.js %>/app.js'
      },
      wptheme: {
        src: [
          '<%= pkg.directories.js %>/wp-theme/*.js',
        ],
        dest: '<%= pkg.directories.js %>/wp-theme.js'      
      }
    }
  });

  require('time-grunt')(grunt);

  grunt.loadNpmTasks ('grunt-contrib-uglify');
  grunt.loadNpmTasks ('grunt-contrib-concat');
  grunt.loadNpmTasks ('grunt-contrib-jshint');
  grunt.loadNpmTasks ('grunt-autoprefixer');
  grunt.loadNpmTasks ('grunt-contrib-sass');
  grunt.loadNpmTasks ('grunt-contrib-watch');
  grunt.loadNpmTasks ('grunt-contrib-compress');

  // Default task(s).
  grunt.registerTask('default', ['compile', 'watch']);
  grunt.registerTask('compile', ['sass:dev', 'concat']);

};