export function loadJob() {
    const tagetElement = document.getElementById("loaded-target");

    if (tagetElement) {
        const observerCallback = (entries, observer) => {
            entries.forEach(async (entry) => {
                if (entry.isIntersecting) {
                    const nextCursor =
                        document.getElementById("cursor").innerHTML ?? null;
                    if (nextCursor) {
                        await fetchJob(nextCursor);
                    } else {
                        observer.unobserve(tagetElement);
                    }
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, {
            root: null, // Root element, null means the browser viewport
            rootMargin: "0px",
            threshold: 1.0, // Trigger the callback when 100% of the target is visible
        });

        // Start observing the target element
        observer.observe(tagetElement);
    }
}

async function fetchJob(nextCursor) {
    // const url = window.location.href;
    // axios({
    //   method: 'get',
    //   url: `${url}?cursor=${nextCursor}`,
    //   responseType: 'json',
    //   data: {
    //     nextCursor: nextCursor
    //   }
    // }).then((response) => {
    //   if (response.data.success) {
    //     document.getElementById('loaded-job').insertAdjacentHTML('beforeend', response.data.html);
    //     document.getElementById('cursor').innerHTML = response.data.nextCursor;
    //   }
    // }).catch((e) => console.log(e));
    try {
        const href = window.location.href;
        const query = window.location.search;
        const url =
            query !== ""
                ? `${href}&cursor=${nextCursor}`
                : `${href}?cursor=${nextCursor}`;

        const response = await fetch(url, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        });
        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                document
                    .getElementById("loaded-job")
                    .insertAdjacentHTML("beforeend", data.html);
                document.getElementById("cursor").innerHTML = data.nextCursor;
            }
        }
    } catch (error) {
        console.log(error);
    }
}
