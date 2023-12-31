<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('') }}
        </x-slot>

        <x-slot name="description">
        @if ($action == "createProduccion")
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">%RENDIMIENTO</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>MATERIA</th>
                            <th>KG</th>
                            <th>%</th>        
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Soya</td>
                            <td> {{$granoDeSoya}}</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Merma</td>
                            <td>{{$merma}}</td>
                            <td>{{$mermaP}}%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Agua</td>
                            <td>{{$agua}}</td>
                            <td>{{$aguaP}}%</td>            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Soya Final</td>
                            <td>{{$secado}}</td>
                            <td>{{$secadoP}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        @if ($action == "updateProduccion")
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">%RENDIMIENTO</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>MATERIA</th>
                            <th>KG</th>
                            <th>%</th>        
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Grano de Soya</td>
                            <td> {{$produccion->secado}}</td>
                            <td>100.00%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Agua</td>
                            <td>{{$produccion->agua2}}</td>
                            <td>{{$produccion->aguaP2}}%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Aceite</td>
                            <td>{{$produccion->aceite}}</td>
                            <td>{{$produccion->aceiteP}}%</td>            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Solvente</td>
                            <td>{{$produccion->harina}}</td>
                            <td>{{$produccion->solventeP}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

        @if ($action == "costoProduccion")
        <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">%RENDIMIENTO</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>MATERIA</th>
                            <th>KG</th>
                            <th>%</th>        
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Grano de Soya</td>
                            <td> {{$produccion->secado}}</td>
                            <td>100.00%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Agua</td>
                            <td>{{$produccion->agua2}}</td>
                            <td>{{$produccion->aguaP2}}%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Aceite</td>
                            <td>{{$produccion->aceite}}</td>
                            <td>{{$produccion->aceiteP}}%</td>            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Solvente</td>
                            <td>{{$produccion->harina}}</td>
                            <td>{{$produccion->solventeP}}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

            <div class="card-body">
            @if ($action == "createProduccion")
            {{ __('Complete los siguientes datos para registrar una nueva producción. Nota: lea correctamente los campos y verifique si están escritos de
                manera adecuada dentro del formulario. El formato de los campos con decimales es de X.XXX (Tres decimales.)') }} 
            @endif
            

            @if($action == "updateProduccion")
            {{ __('Complete los siguientes datos para añadir un balance de materia en la producción que seleccionó. Nota: lea correctamente los campos y verifique  si están escritos de
                manera adecuada dentro del formulario.') }} 
            
            @endif

            @if($action == "costoProduccion")
            {{ __('Los siguientes datos que se muestran en la tabla son los datos de el balance de producción agregado. Si los campos están vacios es porque 
                falta agregar "balance de materia" en el lote seleccionado.') }} 
            
            @endif
            </div>

        <div class="d-flex justify-content-center align-items-center pt-3">
            <x-jet-action-message class="mr-3" on="saved">
                    {{ __($button['submit_response']) }}
                </x-jet-action-message>
            <x-jet-button>
                    {{ __($button['submit_text']) }}
            </x-jet-button>
        </div>
       

        </x-slot>
        

        <x-slot name="form">
        @if($action == "createProduccion")
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4">
                <!--LOTE-->
                <div class="">
                    <x-jet-label for="lote" value="{{ __('Lote') }}" />
                    <small>Edite el número del lote</small>
                    <x-jet-input id="lote" type="number" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" required />
                    <x-jet-input-error for="produccion.lote" class="mt-2" />
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <small>Edite la fecha</small>
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha" required>

                </div>

                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    <small>Seleccione el Turno</small>
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control " required>
                        <option selected >Seleccione el turno</option>
                        @foreach ( $turnos as $turno )    
                        <option  value="{{$turno->id}}" data-index="0">{{$turno->nombreTurno}}</option>
                        @endforeach 
                    </select>  
                                        
                </div>

                <!--BOLSAS-->
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Bolsas') }}" />
                    @if($action == "updateProduccion")
                    <small>Edite la cantidad de bolsas</small>
                    @endif
                    <small>Ingrese cantidad de bolsas</small>
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="produccion.bolsas" required/>
                    <x-jet-input-error for="produccion.bolsas" class="mt-2" />
                </div>
            </div>

            <!----Img de proceso--->
            <div class=" grid grid-cols-1 gap-4">
                <img class="d-inline-block"   src="{{URL::asset('img/pproduccion.jpg')}}" alt="">
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--GRANO DE SOYA-->
                <div class="">
                    <x-jet-label for="granoDeSoya" value="{{ __('Grano de Soya') }}" />
                   
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="granoDeSoya" type="number" class="mt-1 block w- form-control shadow-none"   wire:model="granoDeSoya" wire:model.defer="produccion.granoDeSoya" required />
                    <x-jet-input-error for="produccion.granoDeSoya" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedadGrano" value="{{ __('Humedad') }}" />
                    <small>Ingrese cantidad de humedadGrano en %</small>
                    <x-jet-input id="humedadGrano" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadGrano" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadGrano" required/>
                    <x-jet-input-error for="produccion.humedadGrano" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasaGrano" value="{{ __('Grasa') }}" />
                    <small>Ingrese la cantidad de grasa Grano</small>
                    <x-jet-input id="grasaGrano" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaGrano" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaGrano" required/>


                    <x-jet-input-error for="produccion.grasaGrano" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="" value="{{ __('% Merma Seca') }}" />    
                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaGrano" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="mSecaGrano" wire:model.defer="produccion.mSecaGrano" />

                    <x-jet-input-error for="produccion.mSecaGrano" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-2 pt-2">
                <!--MERMA-->
                <div class="">
                    <x-jet-label for="merma" value="{{ __('Merma') }}" />
                    <small>Ingrese cantidad de merma</small>
                    <x-jet-input id="merma" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model="merma" wire:change="$emit('calcular')" wire:model.defer="produccion.merma" required />
                    <x-jet-input-error for="produccion.merma" class="mt-2" />
                </div>

                <!--AGUA-->
                <div class="">
                    <x-jet-label for="agua" value="{{ __('Agua') }}" />
                    <small>Agua extraida expresada en</small>
                    <x-jet-input id="agua" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="agua" wire:model.defer="produccion.agua" required/>
                    <x-jet-input-error for="produccion.agua" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--SECADO-->
                <div class="">
                    <x-jet-label for="secado" value="{{ __('Secado') }}" />  
                    <small>Valor total del proceso de secado </small>
                    <x-jet-input id="secado" type="text" class="mt-1 block w-full form-control shadow-none" disabled wire:model="secado" wire:model.defer="produccion.secado"/>
                    <x-jet-input-error for="produccion.secado" class="mt-2" />

                </div>
                    
                <!--HUMEDAD DE LABORATORIO-->
                <div class="">
                    <x-jet-label for="humedadSecado" value="{{ __('Humedad') }}" />
                    <small>Humedad obtenido de Laboratorio</small>
                    <x-jet-input id="humedadSecado" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="humedadSecado" wire:change="$emit('calcular')" wire:model.defer="produccion.humedadSecado" required/>

                    <x-jet-input-error for="produccion.humedadSecado" class="mt-2" />
                </div> 

                <!--GRASA DE LABORATORIO-->
                <div class="">
                    <x-jet-label for="grasaSecado" value="{{ __('Grasa') }}" />
                    <small>Cantidad de grasa obtenida del Laboratorio</small>
                    <x-jet-input id="grasaSecado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="grasaSecado" wire:change="$emit('calcular')" wire:model.defer="produccion.grasaSecado" required/>

                    <x-jet-input-error for="produccion.grasaSecado" class="mt-2" />
                </div>

                <!--%MERMA SECA EN SECADO-->
                <div class="">
                    <x-jet-label for="mSecaSecado" value="{{ __('% Merma Seca') }}" />          
                    <small>Total de merma seca en porcentaje </small>
                    <x-jet-input id="mSecaSecado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="mSecaSecado" wire:change="$emit('calcular')" wire:model.defer="produccion.mSecaSecado" disabled />
                    <x-jet-input-error for="produccion.mSecaSecado" class="mt-2" />

                </div>
            </div>

        @endif
<!--##################################################################################################################################-->
        @if($action == "updateProduccion")
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4">
                <!--LOTE-->
                <div class="">
                    <x-jet-label for="lote" value="{{ __('Lote') }}" />
                    <x-jet-input id="lote" type="number" class="mt-1 block w- form-control shadow-none"  wire:model.defer="produccion.lote" disabled/>
                </div>

                <!--FECHA-->
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <input type="date" name="fecha" class="form-control" value="{{ now()->format('Y-m-d') }}"  wire:model.defer="produccion.fecha" disabled>
                </div>

                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control " disabled>
                        <option selected >Seleccione el turno</option>
                        @foreach ( $turnos as $turno )    
                        <option  value="{{$turno->id}}" data-index="0">{{$turno->nombreTurno}}</option>
                        @endforeach 
                    </select>  
                                        
                </div>

                <!--GRANO DE SOYA-->
                <div class="">
                    <x-jet-label for="granoDeSoya" value="{{ __('Grano de Soya') }}" />
                    <x-jet-input id="granoDeSoya" type="number" class="mt-1 block w- form-control shadow-none" wire:model.defer="produccion.granoDeSoya" disabled/>
                </div>
            </div>

            <!----Img de proceso--->
            <div class=" grid grid-cols-1 gap-4">
                <img class="d-inline-block"   src="{{URL::asset('img/pproduccion.jpg')}}" alt="">
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--ACEITE-->
                <div class="">
                    <x-jet-label for="aceite" value="{{ __('Aceite') }}" />
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="aceite" type="number" class="mt-1 block w- form-control shadow-none" wire:change="$emit('calcular')"  wire:model.defer="produccion.aceite" required />
                    <x-jet-input-error for="produccion.aceite" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedadAceite" value="{{ __('Humedad') }}" />
                    <small>Ingrese cantidad de humedadAceite en %</small>
                    <x-jet-input id="humedadAceite" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')"  wire:model.defer="produccion.humedadAceite" required/>
                    <x-jet-input-error for="produccion.humedadAceite" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasaAceite" value="{{ __('Grasa') }}" />
                    <small>Ingrese la cantidad de grasa Grano</small>
                    <x-jet-input id="grasaAceite" type="text" class="mt-1 block w-full form-control shadow-none"  wire:change="$emit('calcular')"  wire:model.defer="produccion.grasaAceite" required/>
                    <x-jet-input-error for="produccion.grasaAceite" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="mSecaAceite" value="{{ __('% Merma Seca') }}" />    
                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaAceite" type="text" class="mt-1 block w-full form-control shadow-none"   wire:model.defer="produccion.mSecaAceite" disabled />
                    <x-jet-input-error for="produccion.mSecaAceite" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--HARINA-->
                <div class="">
                    <x-jet-label for="harina" value="{{ __('Harina') }}" />
                    <small>Ingrese cantidad de grano de soya</small>
                    <x-jet-input id="harina" type="number" class="mt-1 block w- form-control shadow-none" wire:change="$emit('calcular')" wire:model.defer="produccion.harina" required />
                    <x-jet-input-error for="produccion.harina" class="mt-2" />
                </div>

                 <!--HUMEDAD-->
                 <div class="">
                    <x-jet-label for="humedadHarina" value="{{ __('Humedad') }}" />
                    <small>Ingrese cantidad de humedadHarina en %</small>
                    <x-jet-input id="humedadHarina" class="mt-1 block w-full form-control shadow-none" type="text"  wire:change="$emit('calcular')" wire:model.defer="produccion.humedadHarina" required/>
                    <x-jet-input-error for="produccion.humedadHarina" class="mt-2" />
                </div>

                <!--GRASAS-->
                <div class="">
                    <x-jet-label for="grasaHarina" value="{{ __('Grasa') }}" />
                    <small>Ingrese la cantidad de grasa Grano</small>
                    <x-jet-input id="grasaHarina" type="text" class="mt-1 block w-full form-control shadow-none"  wire:change="$emit('calcular')" wire:model.defer="produccion.grasaHarina" required/>
                    <x-jet-input-error for="produccion.grasaHarina" class="mt-2" />

                </div>

                <!--%MERMA SECA-->
                <div class="">
                    <x-jet-label for="mSecaHarina" value="{{ __('% Merma Seca') }}" />    
                    <small>Cantidad de grasa</small>
                    <x-jet-input id="mSecaHarina" type="text" class="mt-1 block w-full form-control shadow-none"   wire:model.defer="produccion.mSecaHarina" disabled />
                    <x-jet-input-error for="produccion.mSecaHarina" class="mt-2" />

                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--%AGUA2-->
                <div class="">
                    <x-jet-label for="mSecaHarina" value="{{ __('Agua') }}" />    
                    <small>Cantidad de Agua</small>
                    <x-jet-input id="agua2" type="text" class="mt-1 block w-full form-control shadow-none"   wire:model.defer="produccion.agua2" disabled />
                    <x-jet-input-error for="produccion.agua2" class="mt-2" />

                </div>
            </div>

        @endif

<!--###################################################################################################################################-->
        @if($action == "costoProduccion")
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4">
                <!--PRODUCCION ID-->
                <div class="">
                    <x-jet-label for="produccion.lote" value="{{ __('N° LOTE') }}" />
                    <x-jet-input id="lote" type="text" class="mt-1 block w-full form-control shadow-none" disabled value="{{ $produccion->lote}}" />
                </div>
                <div class="">
                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                    <x-jet-input id="fecha" type="text" class="mt-1 block w-full form-control shadow-none" disabled value="{{ $produccion->fecha}}" />
                </div>
                <!--TURNO-->
                <div class="">
                    <x-jet-label for="turno" value="{{ __('Turno') }}" />
                    <select wire:model.defer="produccion.idTurno" tabindex="-1" class="form-control " disabled>
                        <option selected >Seleccione el turno</option>
                        @foreach ( $turnos as $turno )    
                        <option  value="{{$turno->id}}" data-index="0">{{$turno->nombreTurno}}</option>
                        @endforeach 
                    </select>  
                                        
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-4 pt-2">
                <!--SOYA EN GRANO-->
                <div class="">
                    <x-jet-label for="soya" value="{{ __('Soya En Grano') }}" />
                    <x-jet-input id="soya" type="number" class="mt-1 block w- form-control shadow-none"   disabled value="{{$produccion->granoDeSoya}}" />
                    <x-jet-input-error for="produccion.soya" class="mt-2" />
                </div>

            </div>
            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--GAS LICUADO-->
                <div class="">
                    <x-jet-label for="gasLicuado" value="{{ __('Gas Licuado') }}" />
                    <x-jet-input id="gasLicuado" type="text" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kg"  wire:change="$emit('calcular')" wire:model.defer="produccion.gasLicuado" required />
                    <x-jet-input-error for="produccion.gasLicuado" class="mt-2" />
                </div>

                <!--PRECIO GAS LICUADO-->
                <div class="">
                    <x-jet-label for="precioGasLicuado" value="{{ __('Precio Bs.') }}" />
                    <x-jet-input id="precioGasLicuado" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioGasLicuado" disabled required/>
                    <x-jet-input-error for="produccion.precioGasLicuado" class="mt-2" />  
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoGasLicuado" value="{{ __('Costo Bs.') }}" />
                    <x-jet-input id="costoGasLicuado" class="mt-1 block w-full form-control shadow-none" type="text" wire:model.defer="produccion.costoGasLicuado" disabled required/>
                    <x-jet-input-error for="produccion.costoGasLicuado" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--PERSONAL-->
                <div class="">
                    <x-jet-label for="personal" value="{{ __('Personal') }}" />
                    <x-jet-input id="personal" type="text" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad" wire:change="$emit('calcular')"  wire:model.defer="produccion.personal" required />
                    <x-jet-input-error for="produccion.personal" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioPersonal" value="{{ __('Precio Bs. ') }}" />
                    <x-jet-input id="precioPersonal" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioPersonal" disabled required/>
                    <x-jet-input-error for="produccion.precioPersonal" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoPersonal" value="{{ __('Costo Bs.') }}" />
                    <x-jet-input id="costoPersonal" class="mt-1 block w-full form-control shadow-none" type="text"  wire:change="$emit('calcular')" wire:model.defer="produccion.costoPersonal" disabled required/>
                    <x-jet-input-error for="produccion.costoPersonal" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--ELECTRICIDAD-->
                <div class="">
                    <x-jet-label for="electricidad" value="{{ __('Electricidad') }}" />
                    <x-jet-input id="electricidad" type="text" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kwh" wire:change="$emit('calcular')" wire:model.defer="produccion.electricidad" required />
                    <x-jet-input-error for="produccion.electricidad" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioElectricidad" value="{{ __('Precio Bs. ') }}" />
                    <x-jet-input id="precioElectricidad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioElectricidad" disabled required/>
                    <x-jet-input-error for="produccion.precioElectricidad" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoElectricidad" value="{{ __('Costo Bs.') }}" />
                    <x-jet-input id="costoElectricidad" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')" wire:model.defer="produccion.costoElectricidad" disabled required/>
                    <x-jet-input-error for="produccion.costoElectricidad" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--TOTAL-->
                <div class="">
                    <x-jet-label for="total" value="{{ __('TOTAL') }}" />
                    <x-jet-input id="total" type="text" class="mt-1 block w- form-control shadow-none"  wire:change="$emit('calcular')" wire:model.defer="produccion.total" disabled required />
                    <x-jet-input-error for="produccion.total" class="mt-2" />
                </div>
                
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--ELECTRICIDAD2-->
                <div class="">
                    <x-jet-label for="electricidad2" value="{{ __('Electricidad') }}" />
                    <x-jet-input id="electricidad2" type="text" class="mt-1 block w- form-control shadow-none" placeholder="Cantidad Kwh" wire:change="$emit('calcular')" wire:model.defer="produccion.electricidad2" required />
                    <x-jet-input-error for="produccion.electricidad2" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioElectricidad" value="{{ __('Precio Bs. ') }}" />
                    <x-jet-input id="precioElectricidad" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioElectricidad" disabled required/>
                   
                    <x-jet-input-error for="produccion.precioElectricidad2" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoElectricidad2" value="{{ __('Costo Bs.') }}" />
                    <x-jet-input id="costoElectricidad2" class="mt-1 block w-full form-control shadow-none" type="text"  wire:change="$emit('calcular')" wire:model.defer="produccion.costoElectricidad2" disabled required/>
                    <x-jet-input-error for="produccion.costoElectricidad2" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--BOLSAS-->
                <div class="">
                    <x-jet-label for="bolsas" value="{{ __('Bolsas') }}" />
                    <x-jet-input id="bolsas" type="text" class="mt-1 block w- form-control shadow-none" placeholder="Unidades" wire:change="$emit('calcular')" wire:model.defer="produccion.bolsas" required />
                    <x-jet-input-error for="produccion.bolsas" class="mt-2" />
                </div>

                 <!--COSTO PREDETERMINADO-->
                <div class="">
                    <x-jet-label for="precioBolsas" value="{{ __('Precio Bs. ') }}" />
                    <x-jet-input id="precioBolsas" class="mt-1 block w-full form-control shadow-none" type="text" wire:model="precioBolsas" disabled required/>
                    <x-jet-input-error for="produccion.precioBolsas" class="mt-2" />
                </div>

                <!--Costo Bs.-->
                <div class="">
                    <x-jet-label for="costoBolsas" value="{{ __('Costo Bs.') }}" />
                    <x-jet-input id="costoBolsas" class="mt-1 block w-full form-control shadow-none" type="text" wire:change="$emit('calcular')" wire:model.defer="produccion.costoBolsas" disabled required/>
                    <x-jet-input-error for="produccion.costoBolsas" class="mt-2" />
                </div>
            </div>

            <div class=" grid grid-cols-1 gap-4 sm:grid-cols-3 pt-2">
                <!--TOTAL COSTO -->
                <div class="">
                    <x-jet-label for="costo_total" value="{{ __('TOTAL COSTO') }}" />
                    <x-jet-input id="costo_total" class="mt-1 block w-full form-control shadow-none" type="text"  wire:change="$emit('calcular')" wire:model.defer="produccion.costo_total" disabled required/>
                    <x-jet-input-error for="produccion.costo_total" class="mt-2" />
                </div>

            </div>
        @endif
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
