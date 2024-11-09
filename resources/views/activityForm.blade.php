<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Proposal Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 12px;
        }

        body {
            padding: 2rem;
        }

        header {
            text-align: center;
            color: #272f5c;
        }

        header h1 {
            font-size: 2rem;
        }

        .horizontal-line {
            height: 2px;
            background-color: black;
            margin: 1rem 0;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: .5rem;
        }

        .act-no {
            margin-top: .5rem;
            text-align: right;
        }

        span {
            text-decoration: underline;
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        table,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-one,
        .table-two,
        .table-three,
        .table-four {
            margin-bottom: 1rem;
        }

        .table-one {
            margin-top: .5rem;
        }

        td {
            padding: 1rem;
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }

        .small {
            font-size: 10px;
        }

        input {
            transform: scale(1.5);
        }
    </style>
</head>

<body>
    <header>
        <h1>UNIVERSITY of the ASSUMPTION</h1>
        <p>Unisite Subdivision, Del Pilar, City of San Fernando, 2000 Pampanga, Philippines</p>
    </header>
    <div class="horizontal-line"></div>
    <div class="main-content">
        <p class="act-no">AF Control No.: <span>{{$activityForms->id}}</span></p>

        <h1>
            ACTIVITY FORM
        </h1>
        <p>
            (Approval Form for In-Campus Activities with corresponding
            Logistics and Funding Requirements)
        </p>
        <p>
            Note: Deadline of Submission of activity form is three days
            before the activity. Please ensure that the date in the
            activity form that you will generate is correct because it
            cannot be changed.
        </p>

        <table class="table-one">
            <tr>
                <td>DEPARTMENT / OFFICE / RSO:</td>
                <td colspan="2" class="bold">NULL</td>
                <td>CONTACT NUMBER OF PROPONENT:</td>
                <td colspan="2" class="bold">NULL</td>
            </tr>
            <tr>
                <td>WHAT (Title)</td>
                <td colspan="5" class="bold">{{$activityForms->title}}</td>
            </tr>
            <tr>
                <td>WHEN (Date)</td>
                <td class="bold">{{$activityForms->date}}</td>
                <td>FROM (Time)</td>
                <td class="bold">{{$activityForms->from_time}}</td>
                <td>TO (Time)</td>
                <td class="bold">{{$activityForms->to_time}}</td>
            </tr>
            <tr>
                <td>WHERE (Venue)</td>
                <td colspan="5" class="bold">{{$activityForms->venue}}</td>
            </tr>
            <tr>
                <td>REQUIREMENTS / RESOURCES NEEDED:</td>
                <td colspan="5" class="bold">{{$activityForms->requirements_or_resources_needed}}</td>
            </tr>
            <tr>
                <td>WHO (Participants - Department / Program / Grade or Year Level)</td>
                <td colspan="2" class="bold">{{$activityForms->participant}}</td>
                <td>Expected Number of Attendees</td>
                <td colspan="2" class="bold">{{$activityForms->attendance_count}}</td>
            </tr>
            <tr>
                <td>WHY (Purpose / Objective)</td>
                <td colspan="5" class="bold">{{$activityForms->description}}</td>
            </tr>
            <tr>
                <td>PROJECTED FUNDING NEEDS</td>
                <td colspan="5" class="bold">NULL</td>
            </tr>
        </table>

        <table class="table-two">
            <tr>
                <td>Prepared by:</td>
                <td>Activity Endorsed by:</td>
                <td>Activity Endorsed by:</td>
                <td>Activity Approved by:</td>
            </tr>
            <tr>
                <td>
                    <p class="bold underline">{{$activityForms->creator->first_name}} {{$activityForms->creator->last_name}}</p>
                    <p class="small">PROPONENT OF ACTIVITY</p>
                </td>
                <td>
                    <p class="bold underline">{{$osaName}}</p>
                    <p class="small">DIR, OFFICE OF STUDENT AFFAIRS</p>
                </td>
                <td>
                    <p class="bold underline">{{$collegeDeanName}}</p>
                    <p class="small">DEAN</p>
                </td>
                <td>
                    <p class="bold underline">{{$vpaaName}}</p>
                    <p class="small">VPAA</p>
                </td>
            </tr>
        </table>

        <table class="table-three">
            <tr>
                <td>Funding Needs Reviewed by:</td>
                <td>Funding Needs Approved by:</td>
                <td>Administrative Support Needs Approved by:</td>
            </tr>
            <tr>
                <td>
                    <p class="bold underline"></p>
                    <p class="small">FINANCE FMS TEAM LEADER</p>
                </td>
                <td>
                    <p class="bold underline"></p>
                    <p class="small">VICE PRESIDENT FOR FINANCE</p>
                </td>
                <td>
                    <p class="bold underline">{{$vpaName}}</p>
                    <p class="small">VICE PRESIDENT FOR ADMINISTRATION</p>
                </td>
            </tr>
        </table>

        <table class="table-four">
            <tr>
                <td rowspan="2">Copy Received by:</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
            </tr>
            <tr>
                <td>Proponent</td>
                <td>EAMO</td>
                <td>PhotoLab</td>
                <td>PPGS</td>
                <td>Security</td>
                <td>Janitorial</td>
                <td>Sports</td>
                <td>Hotel</td>
                <td>Sound System</td>
                <td>Others</td>
            </tr>
        </table>
    </div>
</body>

</html>