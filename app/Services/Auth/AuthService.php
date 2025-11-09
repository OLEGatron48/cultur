<?php

namespace App\Services\Auth;

use App\Mail\DemoEmail;
use App\Models\User\Municipal;
use App\Models\User\School;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;

class AuthService
{

    public function register(array $data) {
        if ($this->getAge($data) < 14) {
            return ['status' => 418, 'message' => 'Нужно ФИО родителей'];
        }

        $password = $this->generatonPassword();

        $school = $this->findRecord(
            School::class,
            $data,
            ['school_type', 'school_name'],
            ['type', 'name']
        );
        $municipal = $this->findRecord(
            Municipal::class,
            $data,
            ['municipal_city', 'municipal_name'],
            ['city', 'name']
        );

        if (!$municipal) {
            $municipal = Municipal::create([
                'city' => $data['municipal_city'],
                'name' => $data['municipal_name'],
            ]);
        }
        if (!$school)
        {
            $school = School::create([
                'type' => $data['school_type'],
                'name' => $data['school_name'],
            ]);
        }


        $user = User::create([
            'password' => Hash::make($password),
            'email' => $data['email'],
            'level' => $data['level'],
            'birthday' => $data['birthday'],
            'municipal_id' => $municipal->id,
            'school_id' => $school->id,
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;

        $this->sendMail($password);

        return [
            'user' => $user,
            'token' => $token,
            'status' => 201,
        ];
    }

    public function login(array $data)
    {
        if (auth()->attempt($data)) {
            $user = auth()->user();

            $token = $user->createToken('auth-token')->plainTextToken;

            return [
                'message' => 'Logged in successfully',
                'user' => $user,
                'token' => $token,
                'status' => 200
            ];
        };

        return [
            'message' => 'Unauthorized',
            'status' => 401
        ];
    }

    private function sendMail(string $password) {
        $mail = new StdClass();

        Mail::send(new DemoEmail($password));
    }

    private function generatonPassword() {
        return Str::password(12);
    }

    private function findRecord(
        $model,
        $data,
        $fields,
        $model_fields=null
    )
    {
        $query = $model::query();

        if ($model_fields) {
            foreach ($fields as $index => $dataField) {
                $modelField = $model_fields[$index];
                    $query->where($modelField, '=', $data[$dataField]);
            }
        } else {
            foreach ($fields as $field) {
                $query->where($field, '=', $data[$field]);
            }
        }

        return $query->first();
    }

    private function getAge(array $data)
    {
        return Carbon::parse($data['birthday'])->age;
    }
}
