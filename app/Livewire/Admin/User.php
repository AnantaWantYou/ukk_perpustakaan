<?php

namespace App\Livewire\Admin;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rules\Password;

class User extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Admin, $Petugas, $Peminjam, $Search;
    public $Create, $name, $email, $password, $password_confirmation;

    protected $validationAttributes = [
        'name' => 'nama',
        'password_confirmation' => 'ulangi password',
    ];

    protected function rules()
    {
        return [

            'name' => 'required',
            
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            
            'password' => ['required', 'confirmed', Password::min(8)],
            
            'password_confirmation' => 'required',
        ];
    }

    function admin()
    {
        $this->Format();
        $this->Admin = true;
    }

    function petugas()
    {
        $this->Format();
        $this->Petugas = true;
    }

    function peminjam()
    {
        $this->Format();
        $this->Peminjam = true;
    }

    function create()
    {
        $this->Create = true;
    }

    function store()
    {
        $this->validate();

        $user = ModelsUser::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>bcrypt($this->password)
        ]);

        if ($this->Admin) {
            $user->assignRole('admin');
        }elseif ($this->Petugas) {
            $user->assignRole('petugas');
        } else {
            $user->assignRole('peminjam');
        }
        session()->flash('sukses', 'Data berhasil ditambahkan.');

        $this->Format();
        
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        if ($this->Search) {
            if ($this->Admin) {
                $user = ModelsUser::role('admin')->where('name', 'like', '%' . $this->Search . '%')->paginate(5);
            } elseif ($this->Petugas) {
                $user = ModelsUser::role('petugas')->where('name', 'like', '%' . $this->Search . '%')->paginate(5);
            } elseif ($this->Peminjam) {
                $user = ModelsUser::role('peminjam')->where('name', 'like', '%' . $this->Search . '%')->paginate(5);
            } else {
                $user = ModelsUser::where('name', 'like', '%' . $this->Search . '%')->paginate(5);
            }
        } else {
            if ($this->Admin) {
                $user = ModelsUser::role('admin')->paginate(5);
            } elseif ($this->Petugas) {
                $user = ModelsUser::role('petugas')->paginate(5);
            } elseif ($this->Peminjam) {
                $user = ModelsUser::role('peminjam')->paginate(5);
            } else {
                $user = ModelsUser::paginate(5);
            }
        }

        return view('livewire.admin.user', compact('user'));
    }

    function Format()
    {
        $this->Admin = false;
        $this->Petugas = false;
        $this->Peminjam = false;
        unset($this->Create);
        unset($this->name);
        unset($this->email);
        unset($this->password);
        unset($this->password_confirmation);
    }

}
