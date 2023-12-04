@extends('layouts.sudokuLayout')

@section('content')
 <!-- start of the sudoku part -->
 <center>
            <span>
                <h1 style="color:white">Sudoku</h1>
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
            <table>
                <tr>
                    <td><h2 id="errorsTitle">Errors:</h2></td>
                    <td><h2 id="errors">0</h2></td>
                    <td><h2 id="timerTitle">Timer:</h2></td>
                    <td><h2 style="color: white" id="timer">00:00</h2></td>
                </tr>
            </table>
            <!-- 9x9 board -->
            <div id="board"></div>
            <br>
            <div id="digits"></div>
            <br>
            <div id="notes"></div>
            <br>
        </center>

@endsection