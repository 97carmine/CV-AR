module.exports = {
	env: {
		browser: true,
		es6: true,
		jquery: true,
	},
	extends: ["eslint:recommended", "jquery", "plugin:prettier/recommended"],
	globals: {
		Atomics: "readonly",
		SharedArrayBuffer: "readonly",
	},
	parserOptions: {
		ecmaVersion: 2018,
		sourceType: "module",
	},
	rules: {
		"prettier/prettier": "warn",
	},
};
