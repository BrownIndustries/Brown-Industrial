module.exports = function(grunt) {
  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'inline'
        },
        files: {
          'assets/css/styles.css': 'assets/css/styles.scss'
        }
      },
      build: {
        options: {
          style: 'compressed'
        },
        files: {
          'assets/css/styles.css': 'assets/css/styles.scss'
        }
      }
    },
    exec: {
      build: {
        cmd: "git commit -am 'Changes Made - Version <%= pkg.version %> built' && git push && git tag -a v<%= pkg.version %> -m 'New Tag"+new Date().getTime()+" ' && git push origin --tags"
      }
    },
    watch: {
      css: {
        files: ['assets/css/{,*/}*.{scss,sass}'],
        tasks: ['sass:dev']
      }
    }
  });
  grunt.registerTask('build', ['sass:build', 'exec:build']);
};
