@extends('layouts.template')
@section('content')

    			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Paiements</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
					                
							    </div><!--//col-->
							   
							    <div class="col-auto">	
                                    @if ($isPaymentDay)
                                     <a class="btn app-btn-secondary" href="{{ route('payment.init') }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
            </svg>
                                            Effectuer les paiements
                                        </a>
                                    @endif
                                    @if (!$isPaymentDay)
                                        <div class="alert alert-danger">Vous ne pourrez effectuer de paiement qu'a la date de paiement</div>
                                    @endif
             					    
                                       
                                    </div>
                                </div><!--//row-->

                                @if (Session::get('success'))
                                    <div class="alert alert-success " role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                
                                @endif

                                @if (Session::get('error_msg'))
                                    <div class="alert alert-danger " role="alert">
                                        {{ Session::get('error_msg') }}
                                    </div>
                                
                                @endif
                            </div><!--//table-utilities-->
                        
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
			    
			   
				
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">id</th>
												<th class="cell">Reference</th>
												<th class="cell">Nom </th>
												<th class="cell">Salaire</th>
                                                <th class="cell">Debut des paiements</th>
                                                <th class="cell">Fin des paiements</th>
                                                <th class="cell">Mois</th>
												<th class="cell">Année</th>
                                                <th class="cell">status</th>
                                                
											</tr>
										</thead>
										<tbody>
                                            @forelse($payments as $payment)
                                                <tr>
                                                    <td class="cell">{{ $payment->id }}</td> 
													<td class="cell">{{ $payment->reference }}</td>
													<td class="cell">{{ $payment->employer->nom }}
                                                                     {{ $payment->employer->prenom }}
                                                    </td>
													<td class="cell">{{ $payment->amount }}</td>
 													<td class="cell">{{ date('d-m-y', strtotime($payment->launch_date)) }}</td>
													<td class="cell">{{ date('d-m-y', strtotime($payment->done_time)) }}</td>
													<td class="cell">{{ $payment->month }}</td> 
                                                    <td class="cell">{{ $payment->year }}</td> 
                                                    @if($payment->status == 'SUCCESS')
                                                    <td class="cell">
                                                        <span class="badge bg-success">{{ $payment->status }}</span>
                                                    </td>
                                                    @endif 
                                                    
                                                </tr>
                                            @empty
                                                <tr>
												<td class="cell" colspan="8"><div style="text-align: center; padding: 1rem;">Aucun paiement effectué</div></td>
												
											</tr>

                                            @endforelse
											

										</tbody>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						<nav class="app-pagination">
							{{ $payments->links() }}
						</nav><!--//app-pagination-->
						
			        </div><!--//tab-pane-->
			        
			       
				</div><!--//tab-content-->
@endsection