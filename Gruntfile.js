module.exports = function(grunt){

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		pug: 
			{
			  compile: {
			    options: {
			      data: {
			        debug: false
			      }
			    },
			    
			    files: {
			      'index.html':['template/index.pug'],
			    },
			    
			  }
			},
		browserSync: 
			{
	            dev: {
	                bsFiles: {
	                    src : [
                        '../style.css',
                        '*.html'
                    ]
	                },
	                options: {
	                    watchTask: true,
	                    proxy: 'table.local'
	                }
	            }
	        },	

		less: 
			{

			  production: {
			    options: 
				    {
					  
					  paths: ['/template'],
						//sourceMap:true,
				      plugins: // временно отлючаю плагины, т.к. sourcemap не работает с ними.
				      	[
				        new (require('less-plugin-autoprefix'))({browsers: ["last 3 versions"]}),
				        new (require('less-plugin-clean-css'))()
				        ],
				    },
			    files: 
				    {
				      'style.css': 'template/style.less'
				    }
			  }
			},	

		watch:
			{
				css:
				{
					files:['template/*.less'],
					tasks:['less'],
					options: {
				      livereload: true,
				    }
				},
				pug:
				{
					files:['template/*.pug'],
					tasks:['pug'],
					options: {
				      livereload: true,
				    }
				}
			}   	

	}); //end .initConfig

	grunt.loadNpmTasks('grunt-contrib-pug');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-browser-sync');


	grunt.registerTask('default',['pug','less', 'browserSync', 'watch']);




}; //end wrap