@extends('layouts.sudokuLayout')

@section('content')
 <!-- start of the sudoku part -->
 <center>
            <span>
                <h1 style="width: 20%; color: white; background-color: #0C0A09; border-radius: 8px;">Sudoku</h1>
            </span>
            <hr>
            <table>
                <tr>
                    <td><div id="restartButton"></div></td>
                    <td><div id="startButton"></div></td>
                    <td><div id="easyButton"></div></td>
                    <td><div id="mediumButton"></div></td>
                    <td><div id="hardButton"></div></td>
                    <td><div id="expertButton"></div></td>
                </tr>
            </table>
            <br>
            <hr>
            <br>
            
            <!-- start button -->
            <div style="width: 30%; background-color: #0C0A09; padding-top:20px; border-radius: 8px;">
                <table>
                    <tr>
                        <td><h2 id="errorsTitle">Errors:</h2></td>
                        <td><h2 id="errors">0</h2></td>
                        <td><h2 id="timerTitle">Timer:</h2></td>
                        <td><h2 style="color: white" id="timer">00:00</h2></td>
                    </tr>
                </table>
            </div>
            <br>
            <!-- 9x9 board -->
            <div id="board"></div>
            <br>
            <div id="digits"></div>
            <br>
            <div id="notes"></div>
            <br>
        </center>

@endsection