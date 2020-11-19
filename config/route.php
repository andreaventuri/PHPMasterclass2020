<?php

use SimpleMVC\Controller;

return [
	['GET', '/', Controller\Home::class],
	['GET', '/hello[/{name}]', Controller\Hello::class],
	['GET', '/admin', Controller\Admin::class],
	['GET', '/article[/{id}]', Controller\Article::class],
	['POST', '/article', Controller\ArticleCreate::class],
	['POST', '/article/{id}', Controller\ArticleUpdate::class],
	['GET', '/article/delete/{id}', Controller\ArticleDelete::class],
	['POST', '/article/delete/{id}', Controller\ArticleDelete::class],
	['GET', '/seed', Controller\Seed::class],
	['GET', '/auth/{action}', Controller\Auth::class],
	['POST', '/auth', Controller\Auth::class],
];
