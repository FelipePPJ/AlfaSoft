<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        /**
         * Return contacts list homepage
         */
        $data = Contact::getUsers();

        return view('home', [ 'data' => $data, 'message' => '']);
    }

    /**
     * Delete a user
     */
    public function delete(Request $request)
    {
        //set variables
        $message = "Invalid User";

        /**
         * Check parameter user_id in route
         */
        if ($request->route('user_id') !== null && is_numeric($request->route('user_id'))) {
            if (Contact::checkUsers($request->route('user_id'))) {
                if (Contact::deleteUsers($request->route('user_id'))) {
                    $message = "User has been deleted";
                }
            }
        }

        /**
         * Return contacts list homepage
         */
        $data = Contact::getUsers();

        return view('home', [ 'data' => $data, 'message' => $message]);
    }

    /**
     * Add a new user
     */
    public function new(Request $request)
    {
        switch ($request->method()) {
            case 'GET':
                return view('new');
                break;

            case 'POST':

                //set variables
                $message = '';

                //Validade fields
                $validated = $request->validate([
                    'name'    => 'required|min:6|max:255',
                    'email'   => 'required|email|unique:contacts,email',
                    'contact' => 'required|numeric|unique:contacts,contact|min:9',
                ]);

                //Record user
                $result = new Contact;
                $result->name = $request['name'];
                $result->email = $request['email'];
                $result->contact = $request['contact'];
                $result->save();

                if ($result) {
                    $message = "Contact registered successfully.";
                } else {
                    $message = "Oh no! Unable to record. Try again.";
                }

                /**
                 * Return contacts list homepage
                 */
                $data = Contact::getUsers();
                return view('home', [ 'data' => $data, 'message' => $message]);

                break;

            default:
                abort(404);
                break;
        }
    }

    /**
     * Edit user
     */
    public function edit(Request $request)
    {
        switch ($request->method()) {
            case 'GET':

                //set variables
                $message = "";
                $data = [];

                /**
                 * Check parameter user_id in route
                 */
                if ($request->route('user_id') !== null && is_numeric($request->route('user_id'))) {
                    if (Contact::checkUsers($request->route('user_id'))) {
                        $data = Contact::getUser($request->route('user_id'));
                    }
                }

                return view('edit', ['data' => $data, 'message' => $message]);
                break;

            case 'POST':

                //set variables
                $message = '';

                //Validade fields
                $validated = $request->validate([
                    'id'      => 'required',
                    'name'    => 'required|min:6|max:255',
                    'email'   => 'required|email',
                    'contact' => 'required|numeric|min:9',
                ]);

                //Record user
                $result = Contact::find($request['id']);
                $result->name = $request['name'];
                $result->email = $request['email'];
                $result->contact = $request['contact'];
                $result->save();

                $message = "Contact registered successfully.";

                /**
                 * Return contacts list homepage
                 */
                $data = Contact::getUsers();
                return view('home', [ 'data' => $data, 'message' => $message]);
                break;

            default:
                abort(404);
                break;
        }
    }
}
