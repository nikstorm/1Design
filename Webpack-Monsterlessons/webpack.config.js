module.exports = {
	entry: './main.js',
	output:{
		filename: './bundle.js'
	},
	resolve: {
		modules: ['node_modules']
	},
	module:{
		loaders: [
			{
				test: /\.js/,
				loader: 'babel-loader',
				exclude: /(node_modules|bower_components)/
			},
			{
			test: /\.css$/,
			loader: 'style-loader!css-loader'
		}
		]
	}
}