<?php

namespace App\Livewire;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class TodoList extends Component
{
    public $tasks;
    public $newTask = '';
    public $editingTaskId = null;
    public $editedTaskTitle = '';
    public $dueDate = '';
    public $priority = 'medium';
    public $filter = 'all';
    protected $rules = [
        'newTask' => 'required|min:3|max:255',
        'dueDate' => 'nullable|date|after_or_equal:today',
        'priority' => 'required|in:low,medium,high'
    ];

    public function mount()
    {
        $this->loadTasks();
    }
    public function loadTasks()
    {
        $query = Auth::user()->tasks()->latest();

        switch($this->filter) {
            case 'completed':
                $query->where('is_completed', true);
                break;
            case 'pending':
                $query->where('is_completed', false);
                break;
            case 'high':
                $query->where('priority', 'high');
                break;
        }
        $this->tasks = $query->get();
    }


    public function addTask()

    {
        $this->validate();

        Auth::user()->tasks()->create([
            'title' => $this->newTask,
            'due_date' => $this->dueDate,
            'priority' => $this->priority,
            'is_completed' => false,
        ]);

        $this->reset(['newTask', 'dueDate', 'priority']);
        $this->loadTasks();
    }

    public function deleteTask($taskId)
    {
        Task::find($taskId)->delete();
        $this->tasks = Task::latest()->get();
    }

    public function toggleComplete($taskId)
    {
        $task = Task::find($taskId);
        $task->update(['is_completed' => !$task->is_completed]);
        $this->tasks = Task::latest()->get();
    }
    public function render()
    {
        return view('livewire.todo-list')
        ->layout('layouts.app');
    }

}
