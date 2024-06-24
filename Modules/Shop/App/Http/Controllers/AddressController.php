<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shop\App\Models\Address;
use Modules\Shop\Repositories\Front\Interfaces\AddressRepositoryInterface;

class AddressController extends Controller
{
    protected $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function create()
    {
        return view('themes.alleywayMuse.addresses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postcode' => 'required|integer',
        ]);

        $data = $request->except('_token');

        Address::create($data);

        return redirect()->route('orders.checkout')->with('success', 'Address added successfully.');
    }

    public function edit($id)
    {
        $address = $this->addressRepository->findByID($id);

        if (!$address || $address->user_id !== auth()->id()) {
            return redirect()->route('orders.checkout')->withErrors('Address not found or unauthorized.');
        }

        return view('themes.alleywayMuse.addresses.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = $this->addressRepository->findByID($id);

        if (!$address || $address->user_id !== auth()->id()) {
            return redirect()->route('orders.checkout')->withErrors('Address not found or unauthorized.');
        }

        $data = $request->all();
        $address->update($data);

        return redirect()->route('orders.checkout');
    }
    
    public function delete($id)
    {
        $address = $this->addressRepository->findByID($id);

        if ($address) {
            $address->forceDelete();
        }

        return redirect()->route('orders.checkout');
    }
}
