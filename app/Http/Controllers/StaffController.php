<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
{
    //Get all
    public function getDoctor(Request $request)
    {

        if ($request->user()->role === 'admin' || $request->user()->role === 'receptionist') {
            return Staff::where('role', '=', 'doctor')->get();
        } else {
            return Response('Access Forbidden', 403);
        }

    }

    // use gate and return 403
    public function getPharmacist(Request $request)
    {
        if ($request->user()->role === 'admin') {
            return Staff::where('role', '=', 'pharmacist')->get();
        } else {
            abort(403);
        }
    }

    public function getReceptionist(Request $request)
    {
        if (Gate::allows("isAdmin")) {
            return Staff::where('role', '=', 'receptionist')->get();
        }

    }

    //Update
    public function updateDoctor(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'doctor') {
                return Staff::find($id)->update($request->all());
            } else {
                return Response('No doctor is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function updatePharmacist(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'pharmacist') {
                return Staff::find($id)->update($request->all());
            } else {
                return Response('No Pharmacist is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function updateReceptionist(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'receptionist') {
                return Staff::find($id)->update($request->all());
            } else {
                return Response('No Receptionist is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    //Find by id
    public function findDoctor(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'doctor') {
                return Staff::find($id);
            } else {
                return Response('No Doctor is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function findPharmacist(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'pharmacist') {
                return Staff::find($id);
            } else {
                return Response('No Pharmacist is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function findReceptionist(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'receptionist') {
                return Staff::find($id);
            } else {
                return Response('No Receptionist is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    //Add
    public function addDoctor(Request $request)
    {

        if ($request->user()->role === 'admin') {
            return Staff::create($request->all());
        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function addPharmacist(Request $request)
    {
        if ($request->user()->role === 'admin') {
            return Staff::create($request->all());
        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function addReceptionist(Request $request)
    {
        if ($request->user()->role === 'admin') {
            return Staff::create($request->all());
        } else {
            return Response('Access Forbidden', 403);
        }

    }

    //Destroy
    public function destroyDoctor(Request $request, $id)
    {

        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }

        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'doctor') {
                return Staff::destroy($id);
            } else {
                return Response('No doctor is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function destroyPharmacist(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'pharmacist') {
                return Staff::destroy($id);
            } else {
                return Response('No Pharmacist is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

    public function destroyReceptionist(Request $request, $id)
    {
        if (Staff::find($id) === null) {
            return Response('Staff not found', 404);
        }
        if ($request->user()->role === 'admin') {
            if (Staff::find($id)->role === 'receptionist') {
                return Staff::destroy($id);
            } else {
                return Response('No Receptionist is associate with id= ' . $id, 403);
            }

        } else {
            return Response('Access Forbidden', 403);
        }

    }

} //Class
