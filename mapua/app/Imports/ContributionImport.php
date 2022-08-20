<?php

namespace App\Imports;

use App\Models\{User,Loans};

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class ContributionImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
        foreach($rows as $row){
            $user = User::where('email',$row['email'])->has('loans')->first();
            // dd(User::find($user->id)->has('loans'));
            // dd($user);
            if(User::find($user->id)->has('loans')){
                $loan = Loans::filterOwner($user->id)->get()->first();
                if(!$loan->loan_amount <= 0){
                    $loan->update([
                        'loan_amount'=>$loan->loan_amount - $row['contribution'],
                    ]); 
                    $loan->contributions()->create([
                        'contribution_amount'=>$row['contribution']
                    ]);
                 }else{
                    $loan->update([
                        'loan_status'=>'Paid'
                    ]);
                }
            }
        }
    }
    public function rules(): array
    {
        return[
            'email'=>'required',
            // 'contribution_amount'=>'required'
        ];
    }
}
