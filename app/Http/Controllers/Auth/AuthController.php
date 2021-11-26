<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\CredentialWrongException;
use App\Helpers\ResponseDataBuilder;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\User\IUserLogin;
use App\Http\Interfaces\User\IUserLogout;
use App\Http\Interfaces\User\IUserRegister;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    private IUserLogin $userLogin;
    private IUserLogout $userLogout;
    private IUserRegister $userRegister;

    /**
     * @param IUserLogin $userLogin
     * @param IUserLogout $userLogout
     * @param IUserRegister $userRegister
     */
    public function __construct(IUserLogin $userLogin, IUserLogout $userLogout, IUserRegister $userRegister)
    {
        $this->userLogin = $userLogin;
        $this->userLogout = $userLogout;
        $this->userRegister = $userRegister;
    }

    /**
     * @param LoginRequest $request
     * @return Response
     */
    public function login(LoginRequest $request): Response
    {
        try {
            return response(ResponseDataBuilder::buildWithData(
                'Login Realizado',
                $this->userLogin->login($request->validated())
            ), 202);
        } catch (CredentialWrongException) {
            return response(ResponseDataBuilder::buildWithoutData('Credenciais erradas'), 401);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * @return Response
     */
    public function logout(): Response
    {
        try {
            $this->userLogout->logout();
            return response(ResponseDataBuilder::buildWithoutData('Deslogado'), 204);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request): Response
    {
        try {
            $fields = $request->validated();
            Arr::set($fields, 'password', bcrypt($fields['password']));
            return response(ResponseDataBuilder::buildWithData(
                'Cadastro realizado',
                $this->userRegister->register($fields)
            ), 201);
        } catch (\Exception $e) {
            return response($e, 500);
        }
    }
}
