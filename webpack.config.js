const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
	devtool: "source-map", // optional
	watch: true, // optional
	entry: {
		combined: "./stylesheets/scss/global.scss",
		blockEditor: "./stylesheets/scss/block-editor.scss",
	},
	resolve: {
		alias: {
			"@": path.resolve(__dirname, "src"),
		},
	},
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "js/[name].js",
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: "babel-loader",
			},
			{
				test: /\.scss$/,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							publicPath: "../", // Use relative paths for CSS assets
						},
					},
					"css-loader", // translates CSS into CommonJS
					"sass-loader", // compiles Sass to CSS, using Node Sass by default
				],
			},
			{
				test: /\.css$/,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							publicPath: "../", // Use relative paths for CSS assets
						},
					},
					"css-loader", // translates CSS into CommonJS
				],
			},
			{
				test: /\.(png|jpe?g|gif|svg)$/i,
				type: "asset/resource",
				generator: {
					filename: "images/[name][ext]",
				},
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: "css/[name].css",
		}),
	],
};
