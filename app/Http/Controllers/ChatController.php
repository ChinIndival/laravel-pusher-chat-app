<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Group;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    protected $message;
    protected $group;

    public function __construct(User $user, Message $message, Group $group)
    {
        $this->user = $user;
        $this->group = $group;
        $this->message = $message;
    }
    public function index()
    {
        $users = $this->user->getUsers();
        $my_messages = $this->message->getMy_Message();
        $my_groups = $this->group->getMy_Group();

        return view('chat', compact('users', 'my_messages', 'my_groups'));
    }

    public function getMess(Request $request)
    {
        $id_user_received = $request->id;
        $my_groups = $this->group->getMy_Group();
        $users = $this->user->getUsers();

        $my_messages = Message::where([
            ['id_user_send', '=', Auth::user()->id],
            ['id_user_received', '=', $id_user_received],
        ])->orWhere([
            ['id_user_received', '=', Auth::user()->id],
            ['id_user_send', '=', $id_user_received],
        ])->get();

        $returnHTML = \view('chat', compact('users', 'my_messages', 'my_groups'))->renderSections()['content'];

        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
