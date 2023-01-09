<?php

namespace App\Mail;

use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TaskEdited extends Mailable
{

    use Queueable, SerializesModels;

    public User $user;
    public Task $task; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Task $task)
    {
        $this->user = $user;
        $this->task= $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email,$this->user->name)
                    ->subject('Task edited')
                    ->view('mails.taskEdited',[
                        'user' => $this-> user,
                        'task' => $this-> task
                    ]);
    }
}
