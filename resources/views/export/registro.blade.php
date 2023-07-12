<table>
    <tr>
        <th>FOLIO</th>
        <th>FECHA DE RECEPCION</th>
        <th>HORA DE RECEPCION</th>
        <th>FECHA DEL DOCUMENTO</th>
        <th>TIPO DE DOCUMENTO</th>
        <th>NUMERO DE DOCUMENTO</th>
        <th>DEPENDENCIA O UNIDAD ADMINISTRATIVA</th>
        <th>SIGNADO POR </th>
        <th>CARGO</th>
        <th>DIRIGIDO A:</th>
        <th>CARGO</th>
        <th>ANEXOS</th>
        <th>SEGUIMIENTO REALIZADO</th>
        <th>RESGUARDO</th>
        <th>HIPERVINCULO INTERNO AL DOCUMENTO</th>
        <th>NOMBRE DE EXPEDIENTE DONDE SE GUARDA</th>
        <th>SECCIÓN CON SERIE</th>
        <th>UBICACIÓN FISICA</th>
        <th>OBSERVACIONES</th>

    </tr>
    <tr>
        <td>{{ $registro->id }}</td>
        <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('d/m/y') }} </td>
        <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('H:i:s') }}</td>
        <td>{{ \Carbon\Carbon::parse($registro->reg_fecha_documento)->format('d/m/y') }}</td>
        <td>{{ $registro->tdocumento->doc_nombre }}</td>
        <td>{{ $registro->reg_ndocumento }}</td>
        <td>{{ $registro->dependencia->dep_nombre }}</td>
        <td>{{ $registro->servidor->emp_nombre }} {{ $registro->servidor->emp_apellido }} </td>
        <td>{{ $registro->servidor->emp_puesto }}</td>
        <td>{{ $registro->dirigido->emp_nombre }} {{ $registro->servidor->emp_apellido }} </td>
        <td>{{ $registro->dirigido->emp_puesto }} </td>
        @if ($registro->reg_anexos === 1)
            <td>si</td>
        @else
            <td>no</td>
        @endif
        <td>{{ $registro->reg_seguimiento }} </td>
        <td>{{ $registro->reg_resguardo }} </td>
        <td>{{ $registro->reg_hiper }} </td>
        <td>{{ $registro->expediente->exp_nombre }} </td>
        <td>{{ $registro->reg_series }} </td>
        <td>{{ $registro->reg_ubicacion }} </td>
        <td>{{ $registro->reg_observaciones }} </td>
    </tr>
</table>
