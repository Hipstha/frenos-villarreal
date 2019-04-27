var webpack = require("webpack");
module.exports = {
  entry: {
    app: __dirname +'/js/main/main.js'
  },
  output: {
    path: __dirname + '/js/main',
    filename: 'output.js'
  },
  resolve: {
    extensions: ['.js']
  },
  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    })
  ]
}
