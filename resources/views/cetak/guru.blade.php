<h1>cetak data guru</h1>
<hr>
<table class="table no-wrap" border="1">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">NIP</th>
                                            <th class="border-top-0">Nama</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">email</th>
                                            <th class="border-top-0">TTL</th>
                                            <th class="border-top-0">Jabatan</th>
                                            <th class="border-top-0">Sekolah</th>
                                            <th class="border-top-0">opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $g)
                                        <tr>
                                            <td>{{$g->id_guru}}</td>
                                            <td class="txt-oflo">{{$g->nip}}</td>
                                            <td>{{$g->id_pengguna}}</td>
                                            <td class="txt-oflo">{{$g->alamat}}</td>
                                            <td><span class="text-success">{{$g->email}}</span></td>
                                            <td><span class="text-success">{{$g->ttl}}</span></td>
                                            <td><span class="text-success">{{$g->jabatan}}</span></td>
                                            <td><span class="text-success">{{$g->id_sekolah}}</span></td>
                                            <td><span class="text-success">
                                            <a class="btn btn-primary" href="/guru/edit/{{$g->id_guru}}">edit</a>
                                            <a class="btn btn-danger" href="/guru/del/{{$g->id_guru}}">hapus</a>
                                            </span></td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>