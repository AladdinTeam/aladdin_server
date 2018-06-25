<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        .progress-circle.indefinite .progress {
            stroke: blue;
            stroke-width: 2;
            stroke-dashoffset: 0;
            stroke-dasharray: 63 188;
            animation: progress-indef 2s linear infinite;
        }

        .progress-circle.indefinite .bg {
            stroke: #eee;
            stroke-width: 2;
        }

        @keyframes progress-indef {
            0% { stroke-dashoffset: 251; }
            100% { stroke-dashoffset: 0; }
        }
    </style>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
</head>
<body>
    <p>Ждем подтверждения от банка</p>
    <svg class="progress-circle indefinite" width="100" height="100">
        <g transform="rotate(-90,50,50)">
            <circle class="bg" r="40" cx="50" cy="50" fill="none"></circle>
            <circle class="progress" r="40" cx="50" cy="50" fill="none"></circle>
        </g>
    </svg>
</body>