<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\{User,Loans};
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class UserContribImport implements ToCollection, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
        foreach($rows as $row){
            $user = User::where('email',$row['email'])->get()->first();
            $user->userContribution->update([
                'contribution_amount'=> $user->userContribution->contribution_amount + $row['contribution_amount']
            ]);

        }
    }
    public function rules(): array
    {
        return[
            'email'=>'required',
            'contribution_amount'=>'required',
      ];
    }
}
