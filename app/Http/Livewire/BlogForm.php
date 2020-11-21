<?php


namespace App\Http\Livewire;


use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Component;

class BlogForm extends Component
{
    public $action;
    public $blog;
    public $dataId;
    public $file;


    public function render()
    {
        return view('livewire.blog-form');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $blog = Blog::findOrFail($this->dataId);

            $this->blog = [
                "title" => $blog->title,
                "writter" => $blog->writter,
                "publish_date" => $blog->publish_date,
                "publisher" => $blog->publisher,
                "content" => $blog->content,
            ];
        }
    }

    public function create()
    {
        $this->blog['slug']=Str::slug($this->blog['title']);
//        $this->data['user_id']=Auth::id();
//        Auth itu mengambil semua data yang aktif
//        $this->data['map_picture'] = md5($this->data['village']).'.'.$this->file->getClientOriginalExtension();
//        $this->file->storeAs('public/map', $this->data['map_picture']);
//        unset($this->data['thumbnail_photo']);
        Blog::create($this->blog);

        $this->reset('blog');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
    }

    public function getRules(){
        if ($this->action=="create"){
            $rules=[
                'blog.title' => ' required|max:256',
                'blog.writter' => 'required',
                'blog.publish_date' => 'required',
                'blog.publisher' => 'required',
                'blog.content' => 'required'
            ];
        }else{
            $rules=[
                'blog.title' => ' required|max:256',
                'blog.writter' => 'required',
                'blog.publish_date' => 'required',
                'blog.publisher' => 'required',
                'blog.content' => 'required'
            ];
        }
        return $rules;
    }

    public function update() {
        $this->resetErrorBag();
        $this->validate();


//        $this->blog['map_picture'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
//        if ($this->file !=null){
//            $this->file->storeAs('public/map/', $this->blog['map_picture']);
//        }
//        dd($this->blogId);

        Blog::find($this->dataId)->update($this->blog);

//        dd($bro);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }
}
