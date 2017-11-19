<?php

Route::get('/', ['as'=>'site.home','uses'=>'SiteController@home']);

Route::get('/auditorios',['as'=>'site.auditorios','uses'=>'AuditorioController@index']);
Route::get('/auditorio/adicionar',['as'=>'admin.auditorio.adicionar','uses'=>'AuditorioController@adicionar']);

Route::post('/auditorio/salvar', ['as'=>'admin.auditorio.salvar','uses'=>'AuditorioController@salvar']);
Route::get('/auditorio/editar/{id}',['as'=>'admin.auditorio.editar','uses'=>'AuditorioController@editar']);
Route::put('/auditorio/atualizar/{id}',['as'=>'admin.auditorio.atualizar','uses'=>'AuditorioController@atualizar']);
Route::get('/auditorio/deletar/{id}',['as'=>'admin.auditorio.deletar','uses'=>'AuditorioController@deletar']);

Route::get('/agendamentos/',['as'=>'agendamento.listar','uses'=>'AgendamentoController@agendamentos']);
Route::get('/agendamento/agendar/{id}',['as'=>'agendamento.agendar','uses'=>'AgendamentoController@agendar']);
Route::post('/agendamento/salvar/',['as'=>'agendamento.salvar','uses'=>'AgendamentoController@salvar']);

// Auth::routes();
Route::get('/login',['as'=>'site.login','uses'=>'LoginController@index']);
Route::get('/login/sair',['as'=>'site.login.sair','uses'=>'LoginController@sair']);
Route::post('/login/entrar',['as'=>'site.login.entrar','uses'=>'LoginController@entrar']);

Route::get('/home', 'HomeController@index')->name('home');

// Pesquisa
Route::get('/pesquisa',['as'=>'pesquisa','uses'=>'PesquisaController@index']);
Route::post('/pesquisar',['as'=>'pesquisar','uses'=>'PesquisaController@pesquisar']);
