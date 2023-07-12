    <!--Modal-->
    <div id="info-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="info-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-6">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                        Modificando datos de usuario
                    </h3>
                    <form class="space-y-6" action="#">
                        <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3 sm:col-start-1">
                                <label for="folio"
                                    class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                <div class="mt-2">
                                    <input type="text" name="folio" id="folio"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-5 p-2.5" />
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="tdocumento"
                                    class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                                <div class="mt-2">
                                    <input type="text" name="folio" id="folio"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-5 p-2.5" />
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="tdocumento"
                                    class="block text-sm font-medium leading-6 text-gray-900">Correo</label>
                                <div class="mt-2">
                                    <input type="text" name="folio" id="folio"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-5 p-2.5" />
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="tdocumento" class="block text-sm font-medium leading-6 text-gray-900">Unidad
                                    o depedencia</label>
                                <div class="mt-1">
                                    <select id="dependencia" name="dependencia"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option>Organo Interno</option>
                                        <option>Secretaria General</option>
                                        <option>Area Coordinadora de archivos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="puesto"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Puesto</label>
                                <div class="mt-1">
                                    <input type="text" name="puesto" id="puesto"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required />
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="telefono"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                                <div class="mt-1">
                                    <input type="text" name="telefono" id="telefono"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required />
                                </div>
                            </div>
                        </div>


                        <button type="submit"
                            class="w-full text-white bg-header boton-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cierre modal-->
    <!--Modal-->
