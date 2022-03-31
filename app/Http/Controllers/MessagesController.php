<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Category::find(2);
        $messages = Message::where('id', '>=', 1)->orderBy('id', 'desc')->paginate(10);
        return view('message.index', compact('messages', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('message.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer|between:1,5',
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:500'
        ]);

        if ($validator->fails()) {
            // $messagebag = $validator->errors();
            // $errmsglist = $messagebag->all();
            return redirect('messages/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $message = new Message;
        $message->category_id = $request->category_id;
        $message->title = $request->title;
        $message->body = $request->body;
        $message->save();

        return redirect('messages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // $category_name = $message->category->name;
        return view('message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $categories = Category::all();
        return view('message.edit', compact('message', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer|between:1,5',
            'title' => 'required|string|max:50',
            'body' => 'required|string|max:500'
        ]);

        if ($validator->fails()) {
            return redirect("messages/{$message->id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        $message->fill($request->except(['_token', '_method']))->save();
        return redirect('messages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index');
    }
}
