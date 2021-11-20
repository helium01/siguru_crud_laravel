<table class="table no-wrap" border="1">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nama Kecamatan</th>
                                            <th class="border-top-0">opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $k)
                                        <tr>
                                            <td>{{$k->id_kecamatan}}</td>
                                            <td class="txt-oflo">{{$k->nama_kecamatan}}</td>
                                            <td><span class="text-success">
                                            <a class="btn btn-primary" href="/kecamatan/edit/{{$k->id_kecamatan}}">edit</a>
                                            <a class="btn btn-danger" href="/kecamatan/del/{{$k->id_kecamatan}}">hapus</a></span></td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>