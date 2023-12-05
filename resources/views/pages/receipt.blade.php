@extends('layouts.base2')


@section('content3')
    <main class="content" style="width: 500px; margin:auto;padding-top: 40px">
        <!-- Button trigger modal -->

        <div class="container-fluid p-0">

            <strong>

                <div class="row">

                    <div class="col-xl-12 d-flex mb-5 d-flex justify-content-center">
                        <div class="">
                            <div class="row">
                                <div class="col-sm-12" style="width: 500px">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <h1 class="text-center">69 Wallet</h1>
                                            <p class="text-center"></p>
                                            {{ str_pad('', 45, '=') }}
                                            <table>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>: {{ $data->format('d M Y H:i:s') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>OrderID</td>
                                                    <td>: {{ $transaksi->id_transaksi }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>: {{ $transaksi->total_item }}SKU</td>
                                                </tr>
                                                <tr>
                                                    <td>Reward</td>
                                                    <td>: +{{ $poin }} poin</td>
                                                </tr>
                                            </table>
                                            {{ str_pad('', 45, '=') }}

                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="width: 40%">{{ $tranDetail->produk->nama_produk }}</td>
                                                    <td style="width: 46%"></td>
                                                    @if ($transaksi->total_harga > 1000)
                                                    <td>Rp{{ number_format($transaksiDetail->harga_satuan) }}
                                                    @elseif($transaksi->total_harga < 999)
                                                    <td>{{ ($transaksi->total_harga) }} Poin</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if ($result)
                                                    <td style="width: 60%">Voucher {{ $reward[0]->nama_reward }}</td>
                                                    <td style="width: 30%"></td>
                                                    <td>-Rp{{ number_format($discount) }}
                                                    </td>
                                                    @endif
                                                </tr>

                                            </table>
                                            <br>
                                            {{ str_pad('', 45, '=') }}
                                            <div class="d-flex justify-content-between">
                                                <p>Total :</p>
                                                @if ($transaksi->total_harga > 1000)
                                                <p>Rp.{{ number_format($transaksi->total_harga) }}</p>
                                                @elseif($transaksi->total_harga < 999)
                                                <p>{{ number_format($transaksi->total_harga) }} Poin</p>
                                                @endif
                                            </div>
                                            <p class="text-center pt-5">Transaksi anda berhasil !</p>
                                            {{-- <div class="d-flex justify-content-center">{!! DNS1D::getBarcodeHTML($transaksi->id_transaksi, 'C128', 3, 60) !!}</div> --}}
                                            <p class="text-center pt-3"></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- {{ dd($poin_achieve) }} --}}
                <form action="{{ url('dash_poin') }}" enctype="multipart/form-data" method="POST">
                    <div class="d-flex justify-content-center mb-5">
                        <input id="poin_achieve" name="poin_achieve"value="3" class="form-control w-25 mb-2" hidden>
                        <a class="btn btn-primary" value="" href="{{ url('dash_poin') }}"
                            type="submit"><i class="fas fa-home"></i>
                            Kembali ke halaman utama</a>
                    </div>
                </form>

        </div>
    </main>
@endsection
