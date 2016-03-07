<!-- Upcoming tab -->
<div id="subscriptions" class="col s12">
  <h3 class="center-align col s12">Here are our upcoming events</h3>
  <div>
    <!--events will be pulled in here from the database base on upcoming events,perhaps based on location?-->
    <section>
      <div class="row">
        <!-- Upcoming Events -->
        @forelse($user->subs as $sub)
          <h4>$sub->username</h4>
          @forelse( $sub->upcoming(4) as $event)
            @include('partials.event-dashboard')
          @empty
            <p>This host has no upcoming events.</p>
          @endforelse

        @empty
          <p class="center-align">
            You are not subscribed to anyone
          </p>
        @endforelse

      </div>
      </section>
  </div>
  </div>