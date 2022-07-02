<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
    <div class="flex justify-between">
      <h4>Last paiements</h4>
      <a href="{{ route('payments.create') }}" class="bg-blue-200 rounded-md shadow p-2 text-white">new payment</a>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-center">
                <thead class="border-b bg-gray-50">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      School year
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Date
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Matricule
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Student Id
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Level
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                     Classroom
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      paid Amount
                    </th>
                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                      Paiement Status
                    </th>
                  </tr>
                </thead class="border-b">
                <tbody>
                  @foreach ($paiements as $payment)
                  <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $payment->payment_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $payment->schoolyear }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $payment->date }}
                    </td>
                   
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $payment->matricule }}
                    </td>
                  
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $payment->lastname.''.$payment->firstname }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $payment->level }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $payment->classroom }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $payment->amountpaid }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><span class="p-2 bg-green-200 rounded-md text-xs">confirmed</span></td>
                  </tr>  
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>