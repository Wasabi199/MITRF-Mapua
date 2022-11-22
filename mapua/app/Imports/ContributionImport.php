<?php

namespace App\Imports;

use App\Models\{User,Loans};

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class ContributionImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
        foreach($rows as $row){
            $user = User::where('school_id',$row['school_id'])->has('loans')->first();
            if(User::find($user->id)->has('loans')){
                $loan = Loans::filterOwner($user->id)->get();
                foreach($loan as $loanUpdate){
                    if($loanUpdate->loan_type == $row['loan_type']){
                        if($loanUpdate->loan_status != 'Paid'){
                            if(!$loanUpdate->loan_amount >= 0){
                            
                                $loanUpdate->update([
                                    'loan_amount'=>$loanUpdate->loan_amount - $row['contribution'],
                                ]); 
                                $loanUpdate->contributions()->create([
                                    'contribution_amount'=>$row['contribution']
                                ]);
    
                                if($loanUpdate->loan_amount <= 0){
                                    $loanUpdate->update([
                                        'loan_status'=>'Paid'
                                    ]);
                                }
    
                             }else{
                                $loanUpdate->update([
                                    'loan_status'=>'Paid'
                                ]);
                            }
                        }
                       
                    }
                    
                }
                
             
            }
        }
    }
    public function rules(): array
    {
        return[
            'email'=>'required',
            'loan_type'=>'required'
        ];
    }
}
