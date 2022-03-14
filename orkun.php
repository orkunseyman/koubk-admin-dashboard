<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FrontendFunn - Semantic UI - Sample Admin Dashboard Template</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
      integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q="
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
      integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <!-- sidebar -->
    <div class="ui sidebar inverted vertical menu sidebar-menu" id="sidebar">
      <div class="item">
        <div class="header">General</div>
        <div class="menu">
          <a class="item">
            <div>
              <i class="icon tachometer alternate"></i>
              Dashboard
            </div>
          </a>
        </div>
      </div>
      <div class="item">
        <div class="header">
          Administration
        </div>
        <div class="menu">
          <a class="item">
            <div><i class="cogs icon"></i>Settings</div>
          </a>
          <a class="item">
            <div><i class="users icon"></i>Team</div>
          </a>
        </div>
      </div>

      <a href="#" class="item">
        <div>
          <i class="icon chart line"></i>
          Charts
        </div>
      </a>

      <a class="item">
        <div>
          <i class="icon lightbulb"></i>
          Apps
        </div>
      </a>
      <div class="item">
        <div class="header">Other</div>
        <div class="menu">
          <a href="#" class="item">
            <div>
              <i class="icon envelope"></i>
              Messages
            </div>
          </a>

          <a href="#" class="item">
            <div>
              <i class="icon calendar alternate"></i>
              Calendar
            </div>
          </a>
        </div>
      </div>

      <div class="item">
        <form action="#">
          <div class="ui mini action input">
            <input type="text" placeholder="Search..." />
            <button class="ui mini icon button">
              <i class=" search icon"></i>
            </button>
          </div>
        </form>
      </div>
      <div class="ui segment inverted">
        <div class="ui tiny olive inverted progress">
          <div class="bar" style="width: 54%"></div>
          <div class="label">Monthly Bandwidth</div>
        </div>

        <div class="ui tiny teal inverted progress">
          <div class="bar" style="width:78%"></div>
          <div class="label">Disk Usage</div>
        </div>
      </div>
    </div>

    <!-- sidebar -->
    <!-- top nav -->

    <nav class="ui top fixed inverted menu">
      <div class="left menu">
        <a href="#" class="sidebar-menu-toggler item" data-target="#sidebar">
          <i class="sidebar icon"></i>
        </a>
        <a href="#" class="header item">
          Semantic UI
        </a>
      </div>

      <div class="right menu">
        <a href="#" class="item">
          <i class="bell icon"></i>
        </a>
        <div class="ui dropdown item">
          <i class="user cirlce icon"></i>
          <div class="menu">
            <a href="#" class="item">
              <i class="info circle icon"></i> Profile</a
            >
            <a href="#" class="item">
              <i class="wrench icon"></i>
              Settings</a
            >
            <a href="#" class="item">
              <i class="sign-out icon"></i>
              Logout
            </a>
          </div>
        </div>
      </div>
    </nav>

    <!-- top nav -->

    <div class="pusher">
      <div class="main-content">
        <div class="ui grid stackable padded">
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header red">
                  <i class="icon shopping cart"></i>
                </div>
                <div class="header">
                  <div class="ui red header">
                    3958
                  </div>
                </div>
                <div class="meta">
                  orders
                </div>
                <div class="description">
                  Elliot requested permission to view your contact details
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <div class="ui red button">More Info</div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header green">
                  <i class="icon clock"></i>
                </div>
                <div class="header">
                  <div class="ui header green">57.6%</div>
                </div>
                <div class="meta">
                  Time
                </div>
                <div class="description">
                  Elliot requested permission to view your contact details
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <div class="ui green button">More Info</div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header teal">
                  <i class="icon briefcase"></i>
                </div>
                <div class="header">
                  <div class="ui teal header">3112</div>
                </div>
                <div class="meta">
                  Saves
                </div>
                <div class="description">
                  Elliot requested permission to view your contact details
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <div class="ui teal button">More Info</div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header purple">
                  <i class="icon trophy"></i>
                </div>
                <div class="header">
                  <div class="ui purple header">9805</div>
                </div>
                <div class="meta">
                  Views
                </div>
                <div class="description">
                  Elliot requested permission to view your contact details
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <div class="ui purple button">More Info</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ui grid stackable padded">
          <div class="column">
            <table class="ui celled striped table">
              <thead>
                <tr>
                  <th colspan="3">
                    Git Repository
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="collapsing">
                    <i class="folder icon"></i> node_modules
                  </td>
                  <td>Initial commit</td>
                  <td class="right aligned collapsing">10 hours ago</td>
                </tr>
                <tr>
                  <td><i class="folder icon"></i> test</td>
                  <td>Initial commit</td>
                  <td class="right aligned">10 hours ago</td>
                </tr>
                <tr>
                  <td><i class="folder icon"></i> build</td>
                  <td>Initial commit</td>
                  <td class="right aligned">10 hours ago</td>
                </tr>
                <tr>
                  <td><i class="file outline icon"></i> package.json</td>
                  <td>Initial commit</td>
                  <td class="right aligned">10 hours ago</td>
                </tr>
                <tr>
                  <td><i class="file outline icon"></i> Gruntfile.js</td>
                  <td>Initial commit</td>
                  <td class="right aligned">10 hours ago</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="ui grid stackable padded">
          <div
            class="four wide computer eight wide tablet sixteen wide mobile  center aligned column"
          >
            <div class="ui teal statistic">
              <div class="value">
                5,550
              </div>
              <div class="label">
                Downloads
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile  center aligned column"
          >
            <div class="ui purple statistic">
              <div class="value">
                50+
              </div>
              <div class="label">
                Developers
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile  center aligned column"
          >
            <div class="ui green statistic">
              <div class="value">
                800+
              </div>
              <div class="label">
                Commits
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile  center aligned column"
          >
            <div class="ui purple statistic">
              <div class="value">
                1000+
              </div>
              <div class="label">
                Cups of Coffee
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
      integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI="
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
  </body>
</html>