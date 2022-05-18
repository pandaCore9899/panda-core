const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
module.exports = {
    entry: {
        panda: path.resolve(__dirname, './resources/assets/js/app.ts')
    },
    mode: 'development',
    devtool: 'inline-source-map', // tim file bi loi
    optimization: {
        splitChunks: {
            chunks: 'all'
        }
    },
    watchOptions: {
        aggregateTimeout: 200,
        poll: 1000,
    },
    // devServerL: {
    //     static: {
    //         directory: path.join(__dirname, 'public'),
    //     },
    //     compress: true,
    //     port: 8002,
    //     devMiddleware:{

    //     }
    // },
    output: {
        path: path.resolve(__dirname, "public"),
        filename: "js/[name].[contenthash].js",
        publicPath: "" // public/
    },
    resolve: { // resole for search source 
        modules: ['node_modules', 'resources'],
        extensions: ["*", ".json", ".ts", ".js"]
    },
    plugins: [
        new TerserPlugin(),
        new HtmlWebpackPlugin({
            template: path.resolve(__dirname, 'resources/assets/template/template.blade.php'),
            filename: path.resolve(__dirname, 'resources/views/layouts/layout.blade.php'),
            minify: true
        }),
        new MiniCssExtractPlugin({
            filename: 'css/[name].[contenthash].css',
        }),
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                path.join(__dirname, 'public/js/**/*'),
                path.join(__dirname, 'public/css/**/*'),
            ],
            verbose: true,
        })
    ],
    module: {
        rules: [{
            test: /\.ts$/,
            exclude: [/node_modules/],
            use: [
                'ts-loader'
            ]

        },
        {
            test: /\.scss/,
            use: [
                MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'
            ]
        },
        {
            test: /\.(png|jpeg|gif|jpg)$/i,
            use: [
                {
                    loader: 'url-loader',
                    options: {
                        limit: 1000,
                        name : 'assets/images/[name].[ext]'
                    }
                },
            ]
        },
        {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader', // down version to compatitable version
                options: {
                    presets: ['@babel/env'],
                    plugins: ['@babel/plugin-proposal-class-properties']
                }
            }
        },
        ]
    }
}