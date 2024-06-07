<x-app-layout>
  
    <style>
        .admin--container{
            color:black;
            position: absolute;
            padding-left: 20px;
            left: 22%;
            top: 9%;
            width: 100%;
            height: 100%;
            /* background-color: red;            */
        }
    
        table{
            border-collapse: collapse;
            width: 100%;
          
        }
       
        th{
            border: 1px solid rgb(182, 182, 182);
        }
       
        th,td{
            padding-left:10px;
            padding-block: 10px;
            text-align: left;
            text-transform: capitalize;
        }
        tbody{
            background-color: rgba(104, 102, 102, 0.103);
        }
        .table-container{
            box-shadow: 1px 1px 10px rgb(165, 165, 165);
            padding: 20px;
            width: 75%;
        }
       
        .td-aksi{
            display:flex;
            column-gap:10px;
            /* width: 10%; */
            justify-content: center;
            /* background-color: red; */
        }
        .td-aksi> a{
            padding: 0;
            padding-inline: 5px;
            padding-top: 5px;
            border-radius: 5px; 
            background-color: rgb(71, 163, 199);
            color: white;
            text-decoration: none;
        }
        .td-aksi> a:nth-child(2){
            background-color: rgb(0, 0, 0);
        }
        .td-aksi> a:nth-child(3){
            background-color: red;
        }
        .td-aksi> a>span>.bx{
            font-size: 1.5rem;
            padding: 0;
        }
        .a--tambah{
            color: rgba(0, 0, 0, 0.753);
            display: flex;
            align-items:center; 
            padding-top: 20px;
            padding-bottom: 10px;
            text-decoration: none;
            transition: all 0.3s linear;
        }
        .a--tambah:hover{
            margin-left: 10px;
        }
        .a--tambah>.bx{
            font-size: 1.5rem;
        }
        td,th{
            text-align: center;
        }
      
    </style>
    <div class="admin--container" id="admin">
        <h1 style="font-weight: 500;font-size:2rem; padding-top:20px;"> Data Produk</h1>
        <a class="a--tambah" href="createproduct">
        <i class='bx bx-plus'></i>
        <span>Tambah Data product</span>
        </a>
        <div class="table-container" id="table">
            <h2 style="font-weight: 500">Data Produk</h2>
            <table>
                <thead >
                    <tr style="font-weight: 100;">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($product as $value)  
                    {{-- @dd($loop->iteration % 2=== 0) --}}
             @csrf
             @method('DELETE')
                @if ($loop->iteration % 2=== 0)
                <tr style="background-color: #ffffff">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->deskripsi }}</td>
                    <td>{{ $value->harga }}</td>
                    <td>{{ $value->stok }}</td>
                    <td>{{ $value->kategori }}</td>
                    <td>
                        <div class="td-aksi">
                            <a href="/viewproduct/?id={{ $value->id }}">
                                <span><i class='bx bx-show-alt'></i></span>
                            </a>
                            <a href="/editproduct/?id={{  $value->id  }}">
                                <span><i class='bx bxs-edit-alt'></i></span>
                            </a>
                            <form action="/deleteproduct/?id={{ $value->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:red;border:none;padding-inline:5px ;color: white;padding-top: 5px;border-radius: 5px;">
                                    <span><i class='bx bx-eraser' style=" font-size: 1.5rem;"></i></span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @else 
                <tr style="background-color: #f6f3f0">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ $value->deskripsi }}</td>
                    <td>{{ $value->harga }}</td>
                    <td>{{ $value->stok }}</td>
                    <td>{{ $value->kategori }}</td>
                    <td>
                        <div class="td-aksi">
                            <a href="/viewproduct/?id={{ $value->id }}">
                                <span><i class='bx bx-show-alt'></i></span>
                            </a>
                            <a href="/editproduct/?id={{  $value->id  }}">
                                <span><i class='bx bxs-edit-alt'></i></span>
                            </a>
                            <form action="/deleteproduct/?id={{ $value->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:red;border:none;padding-inline:5px ;color: white;padding-top: 5px;border-radius: 5px;">
                                    <span><i class='bx bx-eraser' style=" font-size: 1.5rem;"></i></span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endif 
                @endforeach
                </tbody>
            </table>
        </div>
               
    </div>
</x-app-layout>
