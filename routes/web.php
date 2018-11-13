<?php

	Route::get('/', function () {
	    return view('auth.login');
	});
	Auth::routes();
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

	Route::group(['middleware'=>['check.admin.role']], function(){
		//rutas del tecnico
		Route::get('/tareas-pendientes','TechnicianController@pending')->name('pending');
		Route::get('/tareas-iniciadas','TechnicianController@initiated')->name('initiated');
		Route::get('/tareas-finalizadas','TechnicianController@finished')->name('finished');
		Route::patch('/actualizar-anotacion/{task}','TechnicianController@updateAnnotation')->where('task', '\d+')->name('update task annotation');
		Route::get('/editar-anotacion/{task}','TechnicianController@editAnnotation')->name('edit task annotation');
		Route::get('/mostrar-anotacion/{task}','TechnicianController@showAnnotation')->name('show task annotation');
		Route::get('/editar-estado/{task}','TechnicianController@editState')->name('edit task state');
		Route::patch('/actualizar-estado/{task}','TechnicianController@updateState')->where('task', '\d+')->name('update task state');
		//rutas del cliente
		Route::get('/tareas','TaskController@index')->name('tasks.index');
		Route::get('/tareas/edit/{task}','TaskController@edit')->name('tasks.edit');
		Route::put('/tareas/update/{task}','TaskController@update')->name('tasks.update');
		Route::post('/tareas/store','TaskController@store')->name('tasks.store');
		//rutas del jefe
		Route::get('/inicio-jefe','BossController@index')->name('boss index');
	});



	Route::group(['middleware'=>['check.technician.role']], function(){
		//rutas del admin
		Route::resource('usuarios','UserController');
		Route::resource('departamentos','DepartmentController');
		Route::resource('actividades','TaskTypeController');
		Route::resource('lugares','PlaceController');
		//rutas del cliente
		Route::get('/tareas','TaskController@index')->name('tasks.index');
		Route::get('/tareas/edit/{task}','TaskController@edit')->name('tasks.edit');
		Route::put('/tareas/update/{task}','TaskController@update')->name('tasks.update');
		Route::post('/tareas/store','TaskController@store')->name('tasks.store');
		//rutas del jefe
		Route::get('/inicio-jefe','BossController@index')->name('boss index');
	});

	Route::group(['middleware'=>['check.client.role']], function(){
		//rutas del admin
		Route::resource('usuarios','UserController');
		Route::resource('departamentos','DepartmentController');
		Route::resource('actividades','TaskTypeController');
		Route::resource('lugares','PlaceController');
		//rutas del tecnico
		Route::get('/tareas-pendientes','TechnicianController@pending')->name('pending');
		Route::get('/tareas-iniciadas','TechnicianController@initiated')->name('initiated');
		Route::get('/tareas-finalizadas','TechnicianController@finished')->name('finished');
		Route::patch('/actualizar-anotacion/{task}','TechnicianController@updateAnnotation')->where('task', '\d+')->name('update task annotation');
		Route::get('/editar-anotacion/{task}','TechnicianController@editAnnotation')->name('edit task annotation');
		Route::get('/mostrar-anotacion/{task}','TechnicianController@showAnnotation')->name('show task annotation');
		Route::get('/editar-estado/{task}','TechnicianController@editState')->name('edit task state');
		Route::patch('/actualizar-estado/{task}','TechnicianController@updateState')->where('task', '\d+')->name('update task state');
		//rutas del jefe
		Route::get('/inicio-jefe','BossController@index')->name('boss index');
	});

	Route::group(['middleware'=>['check.boss.role']], function(){
		//rutas del admin
		Route::resource('usuarios','UserController');
		Route::resource('departamentos','DepartmentController');
		Route::resource('actividades','TaskTypeController');
		Route::resource('lugares','PlaceController');

		//rutas del tecnico
		Route::get('/tareas-pendientes','TechnicianController@pending')->name('pending');
		Route::get('/tareas-iniciadas','TechnicianController@initiated')->name('initiated');
		Route::get('/tareas-finalizadas','TechnicianController@finished')->name('finished');
		Route::patch('/actualizar-anotacion/{task}','TechnicianController@updateAnnotation')->where('task', '\d+')->name('update task annotation');
		Route::get('/editar-anotacion/{task}','TechnicianController@editAnnotation')->name('edit task annotation');
		Route::get('/mostrar-anotacion/{task}','TechnicianController@showAnnotation')->name('show task annotation');
		Route::get('/editar-estado/{task}','TechnicianController@editState')->name('edit task state');
		Route::patch('/actualizar-estado/{task}','TechnicianController@updateState')->where('task', '\d+')->name('update task state');

		//rutas del cliente
		Route::get('/tareas','TaskController@index')->name('tasks.index');
		Route::get('/tareas/edit/{task}','TaskController@edit')->name('tasks.edit');
		Route::put('/tareas/update/{task}','TaskController@update')->name('tasks.update');
		Route::post('/tareas/store','TaskController@store')->name('tasks.store');
	});


?>