<?php

// SITE
Route::get('/', ['as'=>'site.home','uses'=>'SiteController@home']);
Route::get('/home', 'HomeController@index')->name('home');


// ROLES
Route::get('/roles/setup', 'RoleController@setup');

// Usuarios
Route::get('/usuarios', 'UserController@index');


// AUDITORIOS
Route::get('/auditorios',['as'=>'site.auditorios','uses'=>'AuditorioController@index']);
Route::get('/auditorio/adicionar',['as'=>'admin.auditorio.adicionar','uses'=>'AuditorioController@adicionar']);
Route::post('/auditorio/salvar', ['as'=>'admin.auditorio.salvar','uses'=>'AuditorioController@salvar']);
Route::get('/auditorio/editar/{id}',['as'=>'admin.auditorio.editar','uses'=>'AuditorioController@editar']);
Route::put('/auditorio/atualizar/{id}',['as'=>'admin.auditorio.atualizar','uses'=>'AuditorioController@atualizar']);
Route::get('/auditorio/deletar/{id}',['as'=>'admin.auditorio.deletar','uses'=>'AuditorioController@deletar']);


// Agendamento
Route::get('/agendamentos/',['as'=>'agendamento.listar','uses'=>'AgendamentoController@agendamentos']);
Route::get('/agendamento/agendar/{id}',['as'=>'agendamento.agendar','uses'=>'AgendamentoController@agendar']);
Route::post('/agendamento/salvar/',['as'=>'agendamento.salvar','uses'=>'AgendamentoController@salvar']);
Route::get('/agendamento/confirmar/{id}',['as'=>'agendamento.confirmar','uses'=>'AgendamentoController@confirmar']);
Route::get('/agendamento/negar/{id}',['as'=>'agendamento.negar','uses'=>'AgendamentoController@negar']);


// Autencicação
Auth::routes();


