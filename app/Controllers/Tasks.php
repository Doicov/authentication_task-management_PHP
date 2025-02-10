<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\TasksModel();
    }

    public function index(): string
    {
        $data = $this->model->findAll();

        return view('Tasks/index', [
            'tasks' => $data,
            'title' => 'Листинг задач проекта',
        ]);
    }

    public function show($id)
    {
        $task = $this->getTask0r404($id);
        return view('Tasks/show', [
            'task' => $task,
            'title' => 'Просмотр задачи: '.$task->title,
        ]);
    }

    public function new()
    {
        return view('Tasks/new',[
            'title' => 'Добавить задачу',
        ]);
    }

    public function store()
    {
        
        $task = new Task($this->request->getPost());

        if ($this->model->insert($task)) {
            return redirect()->to('/tasks')->with('success', 'Task created')->with('data', $task);
        } else {
            return redirect()->back()->withInput($task)->with('errors', $this->model->errors());
        }
    }

    public function edit($id)
    {
        $task = $this->getTask0r404($id);

        return view('Tasks/edit', [
            'task' => $task,
            'title' => 'Редактирование задачи: '.$task->title,
        ]);
    }

    public function update($id)
    {

        $task = $this->getTask0r404($id);

        $task->fill($this->request->getPost());

        // if( ! $task->hasChanged()) {
        //     return redirect()->back()->withInput($task)->with('errors', 'Nothing to');
        // }

        if($this->model->save($task)) {
            return redirect()->to('/tasks')->with('success', 'Task updated')->with('data', $task);
            
        }else{
            return redirect()->back()->withInput($task)->with('errors', $this->model->errors());
        } 
    }

    public function delete($id)
    {
        $task = $this->getTask0r404($id);

        if($this->model->delete($id)) {
            return redirect()->to('/tasks')->with('success', 'Task udeleted');
            
        }else{
            return redirect()->back()->with('errors', $this->model->errors());
        } 

    }

    public function getTask0r404($id)
    {
        $task = $this->model->find($id);

        if($task === null){
            //Обработка логики, когда записи с этим id не нашлось
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id: $id not found!"); 
            //Можно вернуть ошибку, или перенаправить на другую страницу
        }
        return $task;
    }
}
