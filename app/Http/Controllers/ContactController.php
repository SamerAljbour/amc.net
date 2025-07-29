<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage as MailContactMessage;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function send(Request $request)
    {
        $lang = $request->header('lang') === 'ar' ? 'ar' : 'en';

        $messages = $lang === 'ar'
            ? [
                'name.required' => 'الاسم مطلوب',
                'name.string'   => 'يجب أن يكون الاسم نصاً',
                'name.max'      => 'يجب ألا يزيد الاسم عن 255 حرفاً',

                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email'   => 'يجب أن يكون البريد الإلكتروني صالحاً',

                'message.required' => 'الرسالة مطلوبة',
                'message.string'   => 'يجب أن تكون الرسالة نصاً',
            ]
            : [
                'name.required' => 'Name is required',
                'name.string'   => 'Name must be a string',
                'name.max'      => 'Name must not exceed 255 characters',

                'email.required' => 'Email is required',
                'email.email'   => 'Email must be a valid email address',

                'message.required' => 'Message is required',
                'message.string'   => 'Message must be a string',
            ];

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ], $messages);

        Mail::to(env('MAIL_TO_ADDRESS', 'default@example.com'))->send(new MailContactMessage($validated));


        return response()->json(['message' => $lang === 'ar' ? 'تم إرسال البريد بنجاح.' : 'Email sent successfully.'], 200);
    }
}
