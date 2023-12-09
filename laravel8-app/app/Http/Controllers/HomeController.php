<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Mobil;
use App\Models\Rental;
use App\Models\Userss;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    //
    public function index(): View
    {

    $carsWithoutRentals = Mobil::doesntHave('rentals')->get();
    $finishedCars = Mobil::whereHas('rentals', function ($query) {
        $query->where('status', 'Selesai');
    })
    ->get();

    $currentTime = now();

    // Jika Anda ingin mengambil nilai tgl_mulai dan tgl_akhir dari tabel rentals berdasarkan car_id
    $carId = 1; // Ganti dengan car_id yang diinginkan
    $rentalsData = DB::table('rentals')
        ->select('tgl_mulai', 'tgl_akhir')
        ->where('mobil_id', $carId)
        ->where(function ($query) use ($currentTime) {
            $query->where('tgl_mulai', '<=', $currentTime)
                ->orWhere('tgl_akhir', '>=', $currentTime);
        })
        ->get();

        return view('dashboard', compact('carsWithoutRentals','finishedCars','rentalsData'));
        
    }
    public function createmobil(){
        return view('create_mobil');
    }
    public function storemobil(Request $request){
        Mobil::create($request->all());

        return redirect('/home');
    }
    public function checkout(Request $request, $carId)
{
    $car = Mobil::findOrFail($carId);

   
    
    $rental = new Rental();
    $rental->status = $request->status;
    // dd( $rental->status);
    $rental->user_id = $request->user_id;
    $rental->mobil_id = $car->id;
    $rental->tgl_mulai = $request->tgl_mulai;
    $rental->tgl_akhir = $request->tgl_akhir;
    $rental->total = $request->total;
    
    
    $rental->save();

    // Tandai mobil sebagai tidak tersedia
    $car->availability = false;
    // $car->save();

    return redirect()->route('home')->with('success', 'Pemesanan berhasil. Terima kasih!');
}
public function showCheckoutForm($carId)
    {
        $car = Mobil::findOrFail($carId);
        // dd('berhasil');
        $users = Userss::all();
        return view('checkout', compact('car','users'));
    }
    public function orderdata()
    {
        $rentals = Rental::with(['car', 'user'])->get();

        return view('orderdata', compact('rentals'));
        
        
    }
    public function return(Request $request): View
    {
        $daysUsed = $request->input('days_used', 0);

        return view('return', compact('daysUsed'));
    }

    public function returnCar(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|string|exists:mobils,no_plat',
        ]);

        $no_plat = $request->input('no_plat');

        // Temukan mobil berdasarkan nomor plat
        $car = Mobil::where('no_plat', $no_plat)->first();

        // Temukan rental yang sesuai
        $rental = Rental::where('mobil_id', $car->id)
            ->where('status', 'Belum Selesai')
            ->first();

        // Jika rental tidak ditemukan atau mobil sudah selesai disewa
        if (!$rental) {
            return redirect()->route('home')->with('error', 'Mobil dengan nomor plat '.$no_plat.' tidak sedang disewa atau sudah selesai disewa.');
        }

        // Hitung selisih hari
        $startDateTime = new \DateTime($rental->start_date);
        $endDateTime = now();
        $daysUsed = $startDateTime->diff($endDateTime)->days;

        // Hitung total biaya
        $totalCost = $daysUsed * $car->sewa;

        // Ubah status rental menjadi "Selesai" dan simpan total biaya
        $rental->update([
            'status' => 'Selesai',
            'total' => $totalCost,
        ]);
        
        
        return redirect()->route('home')->with('success', 'Mobil dengan nomor plat '.$no_plat.' berhasil dikembalikan. Jumlah hari yang dipakai: '.$daysUsed.' hari.');
    }
}
